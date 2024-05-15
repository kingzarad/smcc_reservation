<?php

namespace App\Livewire\Frontend\ReservationProcess;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ReservationItem;
use App\Models\ReservationVenue;
use Livewire\WithoutUrlPagination;

class Thankyou1 extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $reservationID;
    public $item_qty = [];
    public $editMode = false;

    public function mount($reservationID)
    {
        $this->reservationID = $reservationID;
        $items = ReservationItem::where('reservation_id', $this->reservationID)->get();
        foreach ($items as $item) {
            $this->item_qty[$item->id] = $item->quantity; // Use the item's id as the key
        }
    }
    public function render()
    {
        $item = ReservationItem::where('reservation_id', $this->reservationID)->paginate(5, pageName: 'Item-page');
        $venue = ReservationVenue::where('reservation_id', $this->reservationID)->paginate(5, pageName: 'Venue-page');
        return view('livewire.frontend.reservation-process.thankyou1', ['item' => $item, 'venue' => $venue]);
    }

    public function decrementItemQuantity($id)
    {
        if (isset($this->item_qty[$id]) && $this->item_qty[$id] > 1) {
            $this->item_qty[$id]--;
        }
    }

    public function incrementItemQuantity($id)
    {
        $item = ReservationItem::find($id);
        if ($item && (!isset($this->item_qty[$id]) || $this->item_qty[$id] < $item->quantity)) {
            $this->item_qty[$id] = isset($this->item_qty[$id]) ? $this->item_qty[$id] + 1 : 1;
        }
    }

    public function updatedItemQty($value, $id)
    {

        $item = ReservationItem::find($id);

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

    public function handleInputItemChange($id, $value)
    {
        $this->updatedItemQty($id, $value);
    }

    public function changeQty()
    {

        foreach ($this->item_qty as $itemId => $quantity) {

            if ($quantity != 0) {

                $reservItem = ReservationItem::findOrFail($itemId);
                $item_list = Item::findOrFail($reservItem->item_id);

                if ($reservItem->quantity !=  $quantity) {
                    // re add qty to existing stock in item
                    $existingQuantity = $item_list->quantity;
                    $reqty =  $reservItem->quantity -  $quantity;
                    $newQuantity = $existingQuantity + $reqty;

                    if ($newQuantity <= 0) {
                        $item_list->update(['status' => 1]);
                    }
                    $item_list->update(['quantity' => max(0, $newQuantity)]);
                }


                // update reservation item quantity
                $reservItem->update(['quantity' => max(0, $quantity)]);
            }
        }
        $this->editMode = false;
        $this->dispatch('messageModal', status: 'success',  position: 'top', message: 'The reservation item was successfully edited.');
    }

    public function toggleEditMode()
    {

        $this->editMode = !$this->editMode;
    }
}
