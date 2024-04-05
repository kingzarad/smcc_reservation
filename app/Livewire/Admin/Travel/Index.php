<?php

namespace App\Livewire\Admin\Travel;

use Livewire\Component;
use App\Models\TravelOrder;

class Index extends Component
{
    public function render()
    {
        $travelPendingList = TravelOrder::where('status', '1')->get();
        return view('livewire..admin.travel.index',['travelPendingList'=>$travelPendingList]);
    }
}
