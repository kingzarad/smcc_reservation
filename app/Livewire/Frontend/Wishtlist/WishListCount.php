<?php

namespace App\Livewire\Frontend\Wishtlist;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishListCount extends Component
{
    public $wishlisCount;
    protected $listeners = ['wishlistAddedUpdated' => 'checkWishlistCount'];
    public function checkWishlistCount()
    {
        if (Auth::check()) {
            return $this->wishlisCount = Wishlist::where('user_id', auth()->user()->id)->count();
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
