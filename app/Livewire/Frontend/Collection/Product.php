<?php

namespace App\Livewire\Frontend\Collection;

use Livewire\Component;

class Product extends Component
{
    public $products,$categories;

    public function mount($products,$categories){
        $this->products = $products;
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire.frontend.collection.product', ['products' => $this->products, 'categories'=> $this->categories]);
    }
}
