<?php

namespace App\Livewire\Frontend;

use App\Models\TravelOrder;
use Livewire\Component;

class Mytravelorder extends Component
{
    public function render()
    {
        $travel = TravelOrder::where('status', 0)->get();
        return view('livewire.frontend.mytravelorder', ['travel' => $travel]);
    }
}
