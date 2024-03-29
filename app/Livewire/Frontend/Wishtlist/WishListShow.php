<?php

namespace App\Livewire\Frontend\Wishtlist;

use Livewire\Component;
use App\Models\Wishlist;


class WishListShow extends Component
{
    public function render()
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();

        return view('livewire.frontend.wishtlist.wish-list-show', [
            'wishlists' => $wishlists
        ]);
    }

    public function removeWishlist($wishlistID)
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistID)->delete();

        $this->dispatch('wishlistAddedUpdated');

        if ($wishlists) {
            $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Wishlist Remove successfully');
        }

    }
}
