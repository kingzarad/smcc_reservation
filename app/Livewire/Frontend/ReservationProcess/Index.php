<?php

namespace App\Livewire\Frontend\ReservationProcess;

use App\Models\Cart;
use App\Models\Reservation;
use App\Models\ReservationItem;
use Livewire\Component;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $selectedLocation, $dsfrom, $dsto, $dsreturn, $tsfrom, $tsto, $tsreturn, $purpose, $remarks, $signature, $reference_num, $school_premises;

    public function mount()
    {
        // Initialize date values
        $this->dsfrom = now()->format('Y-m-d');
        $this->dsto = now()->addDay()->format('Y-m-d');
        $this->dsreturn = now()->addDay(2)->format('Y-m-d');
        $this->selectedLocation = "inside";
    }

    public function render()
    {
        $users = UserDetails::where('users_id', auth()->user()->id)->first();
        $cartlists = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.reservation-process.index', ['users' => $users, 'cartlists' => $cartlists]);
    }

    public function goBack()
    {
        return $this->redirect('/cart', navigate: true);
    }


    public function ProcessSubmit()
    {
        if (Auth::check()) {
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
                    'min:10',
                    'max:255',
                    'regex:/^(?!.*(\w)\1{2,}).+$/', // Prevent repeated characters
                ],
                'remarks' => [
                    'required',
                    'string',
                    'min:10',
                    'max:255',
                    'regex:/^(?!.*(\w)\1{2,}).+$/', // Prevent repeated characters
                ],
                'signature' => 'required|image',
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
                'remarks.required' => 'The remarks field is required.',
                'purpose.regex' => 'The purpose field cannot contain repeated characters.',
                'remarks.regex' => 'The remarks field cannot contain repeated characters.',
                'remarks.string' => 'The remarks must be a string.',
                'remarks.min' => 'The remarks must be at least :min characters.',
                'remarks.max' => 'The remarks may not be greater than :max characters.', // Added max message
                'signature.required' => 'The signature field is required.',
                'signature.image' => 'Please upload a valid image file for the signature.', // Custom error message for invalid image format
            ]);

            $this->reference_num = $this->getTransNo();
            $existing = Reservation::where('reference_num', $this->reference_num)->exists();

            if ($existing) {
                $this->dispatch('messageModal', status: 'warning', position: 'top', message: 'This reservation has already process.');
                return false;
            }

            $imagePath = $this->signature->store('photos/signature', 'local');

            $data = [
                'reference_num' =>  $this->reference_num,
                'users_id' =>  auth()->user()->id,
                'school_premises' =>  '0',
                'date_from' =>  $this->dsfrom,
                'date_to' =>  $this->dsto,
                'time_from' =>  $this->tsfrom,
                'time_to' =>  $this->tsto,
                'date_return' =>  $this->dsreturn,
                'time_return' =>  $this->tsreturn,
                'purpose' =>  $this->purpose,
                'remarks' =>  $this->remarks,
                'signature' =>   $imagePath,
                'school_premises' => $this->selectedLocation == 'inside' ? 1 : 0
            ];

            $reserv = Reservation::create($data);

            $cartlists = Cart::where('user_id', auth()->user()->id)->get();
            foreach ($cartlists as $cart) {

                ReservationItem::create([
                    'reservation_id' => $reserv->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity
                ]);

                $cart->delete();
            }

            $this->dispatch('messageModal', status: 'success',  position: 'top', message: 'The reservation was successfully placed. Please wait for the administrators confirmation via email.');
            // return $this->redirect("/place-reservation/{$reserv->reference_num}", navigate: true);
            return redirect()->route('place_reservation', ['reference' => $reserv->reference_num]);
        }
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
}
