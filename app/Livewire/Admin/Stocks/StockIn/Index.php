<?php

namespace App\Livewire\Admin\Stocks\StockIn;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $product_id, $quantity_total, $stockby, $stockdate,$s_id;


    public function render()
    {
        $products = Product::with('productImages')->orderBy('created_at', 'DESC')->get();

        return view('livewire.admin.stocks.stock-in.index', ['products'=>$products]);
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->dispatch('closeModal');
    }


    private function resetInput()
    {
        $this->reset(['product_id', 'quantity_total', 'stockby', 'stockdate']);
    }
}
