<?php

namespace App\Livewire\Frontend\ReservationProcess;

use App\Models\Item;
use App\Models\User;
use App\Models\Venue;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\UserDetails;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\ReservationItem;
use App\Models\ReservationVenue;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class Index extends Component
{
    use WithFileUploads;

    use WithPagination, WithoutUrlPagination;
    public $item_qty = [];
    public $venue_qty = [];
    public $selectedVenues = [];
    public $selectedLocation, $imagePath, $dsfrom, $dsto, $dsreturn, $tsfrom, $tsto, $tsreturn, $purpose, $remarks, $signature_upload, $reference_num, $school_premises;
    public $signatureData;
    public $signatureOption = 'draw';

    protected $venuePerPage = 5;
    protected $itemPerPage = 5;

    public function mount()
    {
        // Fetch all items and initialize their quantities to 0
        $items = Item::all();
        foreach ($items as $item) {
            $this->item_qty[$item->id] = 0;
        }

        // Fetch all venue and initialize their quantities to 0
        // $venues = Venue::all();
        // foreach ($venues as $venue) {
        //     $this->venue_qty[$venue->id] = 0;
        // }

        $this->dsfrom = now()->format('Y-m-d');
        $this->dsto = now()->addDay()->format('Y-m-d');
        $this->dsreturn = now()->addDay(2)->format('Y-m-d');
        $this->selectedLocation = "inside";
    }

    public function render()
    {
        $users = UserDetails::where('users_id', auth()->user()->id)->first();
        $item = Item::paginate(5, pageName: 'Item-page');
        $venue = Venue::paginate(5, pageName: 'Venue-page');



        return view('livewire.frontend.reservation-process.index', ['users' => $users, 'item_list' => $item, 'venue_list' => $venue]);
    }


    public function processReserv()
    {

        $hasSelectedVenue = false;
        foreach ($this->venue_qty as $venueId => $quantity) {
            if ($quantity > 0) {
                $hasSelectedVenue = true;
                break;
            }
        }

        $hasSelectedItem = false;
        foreach ($this->item_qty as $itemId => $quantity) {
            if ($quantity > 0) {
                $hasSelectedItem = true;
                break;
            }
        }
        if (!$hasSelectedVenue && !$hasSelectedItem) {
            $this->dispatch('messageModal', status: 'warning', position: 'top', message: 'Please select at least one venue or item.');
            return;
        }

        $this->validate([
            'dsfrom' => 'required|date',
            'dsto' => 'required|date|after_or_equal:dsfrom',
            'dsreturn' => 'required|date|after_or_equal:dsto',
            'tsfrom' => 'required',
            'tsto' => 'required',
            'tsreturn' => 'required',
            'purpose' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^(?!.*(\w)\1{2,}).+$/', // Prevent repeated characters
            ],
            'remarks' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
                'regex:/^(?!.*(\w)\1{2,}).+$/', // Prevent repeated characters
            ],
            'signatureOption' => 'required|in:upload,draw', // Ensure signatureOption is required and allowed values are 'upload' and 'draw'
            'signature_upload' => $this->getSignatureUploadValidationRules(), // Apply conditional validation rules for signature_upload
        ], [
            'dsfrom.required' => 'The date of usage (from) field is required.',
            'dsfrom.date' => 'The date of usage (from) must be a valid date.',
            'dsto.required' => 'The date of usage (to) field is required.',
            'dsto.date' => 'The date of usage (to) must be a valid date.',
            'dsto.after_or_equal' => 'The date of usage (to) must be after or equal to the date of usage (from).',
            'dsreturn.required' => 'The date return field is required.',
            'dsreturn.date' => 'The date return must be a valid date.',
            'dsreturn.after_or_equal' => 'The date return must be after or equal to the date of usage (to).',

            'tsfrom.required' => 'The time of usage (from) field is required.',
            'tsfrom.time' => 'The time of usage (from) must be a valid time.',
            'tsto.required' => 'The time of usage (to) field is required.',
            'tsto.time' => 'The time of usage (to) must be a valid time.',
            'tsto.after_or_equal' => 'The time of usage (to) must be after or equal to the time of usage (from).',
            'tsreturn.required' => 'The time return field is required.',
            'tsreturn.time' => 'The time return must be a valid time.',
            'tsreturn.after_or_equal' => 'The time return must be after or equal to the time of usage (to).',

            'purpose.required' => 'The purpose field is required.',
            'purpose.string' => 'The purpose must be a string.',
            'purpose.min' => 'The purpose must be at least :min characters.',
            'purpose.max' => 'The purpose may not be greater than :max characters.', // Added max message

            'purpose.regex' => 'The purpose field cannot contain repeated characters.',
            'remarks.regex' => 'The remarks field cannot contain repeated characters.',
            'remarks.string' => 'The remarks must be a string.',
            'remarks.min' => 'The remarks must be at least :min characters.',
            'remarks.max' => 'The remarks may not be greater than :max characters.', // Added max message

        ]);

        $existing = Reservation::where('status', 1)  // Include only active reservations or those with a specific status
            ->where(function ($query) {
                // Check for overlapping and exact match conditions for dates and times
                $query->where(function ($dateQuery) {
                    $dateQuery->where('date_from', '<=', $this->dsfrom)
                        ->where('date_to', '>=', $this->dsfrom);
                })->where(function ($timeQuery) {
                    // Existing time overlaps the start time or matches exactly
                    $timeQuery->where(function ($subQuery) {
                        $subQuery->where('time_from', '<=', $this->tsfrom)
                            ->where('time_to', '>=', $this->tsfrom);
                    })
                        // Existing time overlaps the end time or matches exactly
                        ->orWhere(function ($subQuery) {
                            $subQuery->where('time_from', '<=', $this->tsto)
                                ->where('time_to', '>=', $this->tsto);
                        });
                });
            })->exists();


        if ($existing) {
            $this->dispatch('messageModal', status: 'warning', position: 'top', message: 'This reservation date and time are not available.');
            return false;
        }

        $this->reference_num = $this->getTransNo();
        if ($this->signatureData != null) {

            $imageData = explode(',', $this->signatureData)[1];
            $decodedData = base64_decode($imageData);
            $filename = 'signature_' . time() . '.png';
            $this->imagePath = 'photos/signature/' . $filename;
            Storage::disk('public')->put($this->imagePath, $decodedData);
        } else {
            $this->imagePath = $this->signature_upload->store('photos/signature', 'public');
        }
        $user = UserDetails::where('users_id', auth()->user()->id)->first();

        $data = [
            'reference_num' =>  $this->reference_num,
            'users_id' =>  auth()->user()->id,
            'department_id' => $user->department,
            'date_from' =>  $this->dsfrom,
            'date_to' =>  $this->dsto,
            'time_from' =>  $this->tsfrom,
            'time_to' =>  $this->tsto,
            'date_return' =>  $this->dsreturn,
            'time_return' =>  $this->tsreturn,
            'purpose' =>  $this->purpose,
            'remarks' =>  $this->remarks,
            'signature' =>   $this->imagePath,
            'status' => 1,
            'school_premises' => $this->selectedLocation == 'inside' ? 1 : 0
        ];

        $reserv = Reservation::create($data);

        foreach ($this->item_qty as $itemId => $quantity) {
            if ($quantity != 0) {
                ReservationItem::create([
                    'reservation_id' => $reserv->id,
                    'item_id' => $itemId,
                    'quantity' => $quantity
                ]);

                $item_list = Item::findOrFail($itemId);
                $existingQuantity = $item_list->quantity;

                $newQuantity = $existingQuantity - $quantity;

                if ($newQuantity <= 0) {
                    $item_list->update(['status' => 1]);
                }
                $item_list->update(['quantity' => max(0, $newQuantity)]);
            }
        }

        // foreach ($this->venue_qty as $venueId => $quantity) {
        //     if ($quantity != 0) {
        //         ReservationVenue::create([
        //             'reservation_id' => $reserv->id,
        //             'venue_id' => $venueId,
        //             'quantity' => $quantity
        //         ]);


        //     }
        // }

        foreach ($this->selectedVenues as $venueId => $isChecked) {
            if ($isChecked) {
                ReservationVenue::create([
                    'reservation_id' => $reserv->id,
                    'venue_id' => $venueId,
                    'quantity' => $quantity
                ]);
            }
        }

        $reference = $this->reference_num;
        $referenceNumber = substr($reference, 7);
        $users = User::where('id', auth()->user()->id)->first();

        $link = route('permit.download', ['reference' => $reserv->reference_num]);
        $details = [
            'greeting' => "Congratulation🎊",
            'body' => "
             The reservation has been successfully approved.
            <br> Thank You!",
            'lastline' => '',
            'regards' => "Download Permit: $link"
        ];
        Notification::send($users, new CustomerNotification($details));
        $this->dispatch('messageModal', status: 'success',  position: 'top', message: 'The reservation was successfully placed. Please wait for the administrators confirmation via email.');
        return redirect()->route('place_reservation', ['reference' => $reserv->reference_num]);
    }


    public function getTransNo()
    {
        try {
            $sdate = date("Ymd");
            $transno = Reservation::select('reference_num')
                ->where('reference_num', 'like', '%' . $sdate . '%')
                ->orderByDesc('id')
                ->first();

            if ($transno) {
                $count = intval(substr($transno->reference_num, 11, 4));
                $label_transno = "REF" . $sdate . ($count + 1);
            } else {
                $label_transno = "REF" . $sdate . "1001";
            }

            return $label_transno;
        } catch (\Exception $ex) {
            // Log or handle the exception as needed
            return $ex->getMessage();
        }
    }

    public function getSignatureUploadValidationRules()
    {

        return $this->signatureOption === 'upload' ? 'required|image' : ''; // Only require signature_upload if signatureOption is 'upload'
    }

    public function logSignatureOption($value)
    {
        $this->signatureOption = $value;
    }

    public function goBack()
    {
        return redirect()->route('home');
    }

    public function decrementItemQuantity($id)
    {
        if (isset($this->item_qty[$id]) && $this->item_qty[$id] > 0) {
            $this->item_qty[$id]--;
        }
    }

    public function incrementItemQuantity($id)
    {
        $item = Item::find($id);
        if ($item && (!isset($this->item_qty[$id]) || $this->item_qty[$id] < $item->quantity)) {
            $this->item_qty[$id] = isset($this->item_qty[$id]) ? $this->item_qty[$id] + 1 : 1;
        }
    }

    // public function decrementVenueQuantity($id)
    // {

    //     if (isset($this->venue_qty[$id]) && $this->venue_qty[$id] > 0) {
    //         $this->venue_qty[$id]--;
    //     }
    // }

    // public function incrementVenueQuantity($id)
    // {
    //     $venue = Venue::find($id);
    //     if ($venue && (!isset($this->venue_qty[$id]) || $this->venue_qty[$id] < $venue->quantity)) {
    //         $this->venue_qty[$id] = isset($this->venue_qty[$id]) ? $this->venue_qty[$id] + 1 : 1;
    //     }
    // }

    // public function updatedVenueQty($value, $id)
    // {

    //     $venue = Venue::find($id);
    //     if ($venue) {
    //         $maxQuantity = $venue->quantity;
    //         if ($value < 0) {
    //             $this->venue_qty[$id] = 0;
    //         } elseif ($value > $maxQuantity) {
    //             $this->venue_qty[$id] = $maxQuantity;
    //         } else {
    //             $this->venue_qty[$id] = $value;
    //         }
    //     }
    // }

    public function updatedItemQty($value, $id)
    {

        $item = Item::find($id);
        if ($item) {
            $maxQuantity = $item->quantity;
            if ($value < 0) {
                $this->item_qty[$id] = 0;
            } elseif ($value > $maxQuantity) {
                $this->item_qty[$id] = $maxQuantity;
            } else {
                $this->item_qty[$id] = $value;
            }
        }
    }

    // public function handleInputVenueChange($id, $value)
    // {
    //     $this->updatedVenueQty($id, $value);
    // }

    public function handleInputItemChange($id, $value)
    {
        $this->updatedItemQty($id, $value);
    }

    public function clearSignature()
    {

        $this->dispatch('clearSignature');
    }
}
