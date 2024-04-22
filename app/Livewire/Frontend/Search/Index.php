<?php

namespace App\Livewire\Frontend\Search;

use Livewire\Component;

class Index extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.frontend.search.index');
    }
}
