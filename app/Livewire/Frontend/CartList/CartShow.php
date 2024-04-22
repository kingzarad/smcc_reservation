<?php

namespace App\Livewire\Frontend\CartList;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class CartShow extends Component
{
    public $quantities = [];

    public function render()
    {
        $cartlists = Cart::where('user_id', auth()->user()->id)->get();

        return view('livewire.frontend.cart-list.cart-show',  [
            'cartlists' => $cartlists
        ]);
    }

    public function updateQuantity($cartlistId, $newQuantity)
    {
        $cartlist = Cart::find($cartlistId);
        if ($cartlist) {
            $cartlist->quantity = $newQuantity;
            $cartlist->save();
        }
    }

    public function removeCartlist($cartlistID)
    {
        $cartlist = Cart::where('user_id', auth()->user()->id)->where('id', $cartlistID)->delete();

        $this->dispatch('cartlistAddedUpdated');

        if ($cartlist) {
            $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Product remove successfully');
        }
    }


    public function quantityMinus($cartlistId)
    {
        $cartlist = Cart::find($cartlistId);
        if ($cartlist && $cartlist->quantity > 1) {
            $cartlist->quantity--;
            $cartlist->save();
        }
    }

    public function quantityAdd($cartlistId)
    {
        $cartlist = Cart::find($cartlistId);
        $product = Product::find(['id' => $cartlist->product_id])->first();

        if ($cartlist) {
            if ($cartlist->quantityt > $product->quantity) {
                $cartlist->quantity++;
                $cartlist->save();
            } else {
                $this->dispatch('messageModal', status: 'info', position: 'top', message: "Only {$product->quantity} quantity is available");
            }
        }
    }


    public function processReservation()
    {
        $this->dispatch('messageModal', status: 'info', position: 'top', message: 'Fill out the data accordingly. Thank you');
        return $this->redirect('/reservation-process', navigate: true);
    }
}
