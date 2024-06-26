<?php

namespace App\Livewire\Admin\Reservation;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Venue;
use Livewire\Component;

use App\Models\Department;
use App\Models\remarks;
use App\Models\Reservation;

use App\Models\UserDetails;
use App\Models\ReservationItem;
use App\Models\ReservationVenue;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class History extends Component
{

    public $item = [], $details = [], $users = [], $itemCount, $reservation_id, $referenceNumber, $status, $expire_status = false, $image;
    public $venue_list = [];
    public $item_list = [];
    public $remarks_msg;


    public function render()
    {
        $reservationsList = [];
        $reservationlists = Reservation::orderBy('created_at', 'desc')
            ->get();

        foreach ($reservationlists as $reservation) {
            if ($reservation) {
                if (isset($reservationsList[$reservation->reference_num])) {
                    continue;
                }

                $departname = Department::where('id', $reservation->department_id)->first();
                $users = UserDetails::where('users_id', $reservation->users_id)->first();

                $name = ucwords($users->firstname . " " . ($users->middlename ?? '') . " " . $users->lastname);

                $reservationData = [
                    'id' => $reservation->id,
                    'reference_num' => $reservation->reference_num,
                    'date_filled' => $reservation->date_filled,
                    'status' => $reservation->status,
                    'departname' => ucfirst(strtolower($departname->department_name)),
                    'name' =>  $name
                ];


                $reservationsList[$reservation->reference_num] = (object) $reservationData;
            }

        }

        return view('livewire.admin.reservation.history', ['reservationlists' => $reservationsList]);
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }

    public function showSingle($id)
    {
        $currentDate = Carbon::now();

        $reservation = Reservation::where('id', $id)
            ->orderByDesc('id')
            ->first();


        if ($reservation) {
            $returnDate = Carbon::parse($reservation->date_from);

            $reference = $reservation->reference_num;
            $referenceNumber = substr($reference, 7);

            $users = UserDetails::where('users_id', $reservation->users_id)->first();
            $item = ReservationItem::where('reservation_id', $reservation->id)->get();
            $itemCount = ReservationItem::where('reservation_id', $reservation->id)->count();

            if ($currentDate->isSameDay($returnDate)) {
                $this->expire_status = true;
            }

            $items = ReservationItem::where('reservation_id', $reservation->id)->get();
            $venue = ReservationVenue::where('reservation_id', $reservation->id)->get();

            $this->venue_list = $venue;
            $this->item_list = $items;

            // dd( $reservation->item);
            $this->reservation_id = $reservation->id;
            $this->details = $reservation;
            $this->item = $item;
            $this->users = $users;
            $this->itemCount = $itemCount;
            $this->referenceNumber = $referenceNumber;
            $this->image = $reservation->signature;
            $this->status = $reservation->status;
        }
    }

    public function cancelReservation()
    {
        $reserv = Reservation::where('id', $this->reservation_id)->first();
        $items = ReservationItem::where('reservation_id', $reserv->reservation_id)->get();
        $venues = ReservationVenue::where('reservation_id', $reserv->reservation_id)->get();

        $users = User::where('id', $reserv->users_id)->first();


        foreach ($items as $item) {

            $item_list = Item::findOrFail($item->item_id);
            $existingQuantity = $item_list->quantity;

            $newQuantity = $existingQuantity + $item->quantity;


            if ($newQuantity <= 0) {
                $item_list->update(['status' => 0]);
            }
            $item_list->update(['quantity' => max(0, $newQuantity)]);
        }

        // foreach ($venues as $venue) {

        //     $venue_list = Venue::findOrFail($venue->venue_id);
        //     $existingQuantity = $venue_list->quantity;

        //     $newQuantity = $existingQuantity + $venue->quantity;


        //     if ($newQuantity <= 0) {
        //         $venue_list->update(['status' => 0]);
        //     }
        //     $venue_list->update(['quantity' => max(0, $newQuantity)]);
        // }


        $reservation = Reservation::findOrFail($this->reservation_id);
        $reservation->update([
            'status' => 2,
        ]);

        $link = route('place_reservation', ['reference' => $reserv->reference_num]);
        $details = [
            'greeting' => "Reservation Cancelled",
            'body' => "The reservation has been cancelled by the administrator. For more information, please visit the office. . <br> Sorry for the inconvenience.",
            'lastline' => '',
            'regards' => "Visit: $link"
        ];

        Notification::send($users, new CustomerNotification($details));
        $this->dispatch('destroyModal', status: 'success', position: 'top', message: 'Reservation canceleed successfully.', modal: '#showHistory');
    }

    public function doneReservation()
    {


        $reservation = Reservation::where('id', $this->reservation_id)->first();
        $users = User::where('id', $reservation->users_id)->first();
        $items = ReservationItem::where('reservation_id', $reservation->id)->get();
        $venues = ReservationVenue::where('reservation_id', $reservation->id)->get();


        foreach ($items as $item) {

            $item_list = Item::findOrFail($item->item_id);
            $existingQuantity = $item_list->quantity;

            $newQuantity = $existingQuantity + $item->quantity;


            if ($newQuantity <= 0) {
                $item_list->update(['status' => 0]);
            }
            $item_list->update(['quantity' => max(0, $newQuantity)]);
        }

        // foreach ($venues as $venue) {

        //     $venue_list = Venue::findOrFail($venue->venue_id);
        //     $existingQuantity = $venue_list->quantity;

        //     $newQuantity = $existingQuantity + $venue->quantity;


        //     if ($newQuantity <= 0) {
        //         $venue_list->update(['status' => 0]);
        //     }
        //     $venue_list->update(['quantity' => max(0, $newQuantity)]);
        // }

        $data = [
            'reservation_id' => $this->reservation_id,
            'remarks_msg' => $this->remarks_msg ?? 'blank'
        ];
        remarks::create($data);

        $reservation->update([
            'status' => 3,
        ]);

        $link = route('place_reservation', ['reference' => $reservation->reference_num]);
        $details = [
            'greeting' => "Reservation Completed",
            'body' => "The reservation has been successfully completed. Thank you for choosing us! <br> If you have any questions, feel free to contact us. <br> We look forward to serving you again.",
            'lastline' => '',
            'regards' => "Visit: $link"
        ];
        Notification::send($users, new CustomerNotification($details));

        $this->dispatch('destroyModal', status: 'success', position: 'top', message: 'Reservation mark as done successfully.', modal: '#completedtModal');
    }
}
