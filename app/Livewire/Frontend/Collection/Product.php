<?php

namespace App\Livewire\Frontend\Collection;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Product extends Component
{
    public $products, $categories;
    use WithPagination, WithoutUrlPagination;
    public function mount($products, $categories)
    {
        $this->products = $products;
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire.frontend.collection.product', ['products' => $this->products, 'categories' => $this->categories]);
    }


}
