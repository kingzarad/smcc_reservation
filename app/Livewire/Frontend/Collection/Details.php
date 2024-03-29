<?php

namespace App\Livewire\Frontend\Collection;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Details extends Component
{
    public $products, $products_suggest, $quantityCount = 1;

    public function mount($products, $products_suggest)
    {
        $this->products = $products;
        $this->products_suggest = $products_suggest;
    }

    public function render()
    {
        return view('livewire.frontend.collection.details', ['products' => $this->products, 'products_suggest' => $this->products_suggest]);
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function incrementQuantity()
    {

        if ($this->quantityCount < $this->products->quantity) {
            $this->quantityCount++;
        }
    }

    public function addToCart($productID)
    {
        if (Auth::check()) {
            if (auth()->user()->status != "incomplete") {
                $existingCartItem = Cart::where('user_id', auth()->user()->id)
                    ->where('product_id', $productID)
                    ->first();

                if ($this->products->where('id', $productID)->where('status', '0')->exists()) {
                    if ($this->products->quantity >= $this->quantityCount) {
                        if ($existingCartItem) {
                            // Update the quantity of the existing cart item

                            if ($existingCartItem->quantity  >=  $this->products->quantity) {
                                $this->dispatch('messageModal', status: 'warning', position: 'top', message: ucfirst($this->products->category->name) . '  are already added to your cart. Only ' . $this->products->quantity  . ' quantity is available.');
                                return false;
                            } else {
                                $existingCartItem->update([
                                    'quantity' => $existingCartItem->quantity + $this->quantityCount,
                                ]);
                            }
                        } else {

                            $this->dispatch('cartlistAddedUpdated');

                            // Create a new cart item
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productID,
                                'quantity' => $this->quantityCount,
                            ]);
                        }

                        $this->dispatch('messageModal', status: 'success', position: 'top', message: ucfirst($this->products->category->name) . ' added successfully');
                    } else {
                        $this->dispatch('messageModal', status: 'warning', position: 'top', message: 'Only ' . $this->products->quantity  . ' quantity available');

                       // return $this->redirect();
                    }
                } else {
                    $this->dispatch('messageModal', status: 'warning', position: 'top', message: ucfirst($this->products->category->name ).'already added to cart');
                }
            } else {
                $this->dispatch('messageModal', status: 'warning', position: 'top', message: 'Please complete your details before adding items or property. under the profile page');
                return $this->redirect('/myaccount/profile', navigate: true);
            }
        } else {
            $this->dispatch('messageModal', status: 'info', position: 'top', message: 'Please login or register first before to continue.');
            return $this->redirect('/login', navigate: true);
        }
    }


    public function addToWishlist($productID)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productID)->exists()) {
                $this->dispatch('messageModal', status: 'warning', position: 'top', message: 'Already added to wishlist');
                return false;
            } else {
                $this->dispatch('wishlistAddedUpdated');

                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productID,
                ]);
                $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Wishlist Added successfully');
            }
        } else {

            $this->dispatch('messageModal', status: 'info', position: 'top', message: 'Please login or register first before to continue.');
            return $this->redirect('/login', navigate: true);
            return false;
        }
    }
}
