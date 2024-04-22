<?php

namespace App\Livewire\Frontend\Reserved;

use Livewire\Component;
use App\Models\ReservationItem;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $reserved = ReservationItem::paginate(10);
        return view('livewire.frontend.reserved.index', ['reserved' => $reserved]);
    }
}
