<?php

namespace App\Livewire\Frontend\CartList;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartlisCount;
    protected $listeners = ['cartlistAddedUpdated' => 'checkCartlistCount'];
    public function checkCartlistCount()
    {
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', auth()->user()->id)->get();
            $existingCount = $cartItems->filter(function ($cartItem) {
                return Product::where('id', $cartItem->product_id)->exists();
            })->count();

            return $this->cartlisCount = $existingCount;
        } else {
            return  $this->cartlisCount = 0;
        }
    }

    public function render()
    {
        $this->cartlisCount = $this->checkCartlistCount();

        return view('livewire.frontend.cart-list.cart-count', ['cartlisCount' => $this->cartlisCount]);
    }
}
