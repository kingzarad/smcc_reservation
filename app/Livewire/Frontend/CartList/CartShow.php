<?php

namespace App\Livewire\Frontend\CartList;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public function render()
    {
        $cartlists = Cart::where('user_id', auth()->user()->id)->get();

        return view('livewire.frontend.cart-list.cart-show',  [
            'cartlists' => $cartlists
        ]);
    }

    public function removeCartlist($cartlistID)
    {
        $cartlist = Cart::where('user_id', auth()->user()->id)->where('id', $cartlistID)->delete();

        $this->dispatch('cartlistAddedUpdated');

        if ($cartlist) {
            $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Product remove successfully');
        }
    }

    public function processReservation(){
        $this->dispatch('messageModal', status: 'info', position: 'top', message: 'Fill out the data accordingly. Thank you');
        return $this->redirect('/reservation-process', navigate: true);
    }
}
