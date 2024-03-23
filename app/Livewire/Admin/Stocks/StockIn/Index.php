<?php

namespace App\Livewire\Admin\Stocks\StockIn;

use Livewire\Component;

class Index extends Component
{
    public $product_id, $quantity_total, $stockby, $stockdate,$s_id;


    public function render()
    {
        return view('livewire.admin.stocks.stock-in.index');
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
