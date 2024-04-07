<?php

namespace App\Livewire\Frontend\Wishtlist;

use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListCount extends Component
{
    public $wishlisCount;
    protected $listeners = ['wishlistAddedUpdated' => 'checkWishlistCount'];
    public function checkWishlistCount()
    {
        if (Auth::check()) {
            $wishlistItems = Wishlist::where('user_id', auth()->user()->id)->get();
            $existingCount = $wishlistItems->filter(function ($wishlistItem) {
                return Product::where('id', $wishlistItem->product_id)->exists();
            })->count();

            return $this->wishlisCount = $existingCount;
        } else {
            return  $this->wishlisCount = 0;
        }
    }
    public function render()
    {
        $this->wishlisCount = $this->checkWishlistCount();
        return view('livewire.frontend.wishtlist.wish-list-count', ['wishlistCount' => $this->wishlisCount]);
    }
}
