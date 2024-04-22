<?php

namespace App\Livewire\Admin\Graph;

use Livewire\Component;

class Index extends Component
{
    public $data;

    public function mount()
    {

        $this->data = [
            ['Day' => 'Mon', 'Value' => 10]
        ];
    }

    public function render()
    {
        return view('livewire.admin.graph.index');
    }
}
