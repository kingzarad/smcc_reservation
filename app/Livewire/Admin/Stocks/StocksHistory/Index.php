<?php

namespace App\Livewire\Admin\Stocks\StocksHistory;

use Livewire\Component;
use App\Models\StockEntry;

class Index extends Component
{
    public function render()
    {
        $stockinList = StockEntry::with('product')
        ->where('status', 'completed')
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('livewire.admin.stocks.stocks-history.index', ['stockinList'=>$stockinList]);
    }
}
