<?php

namespace App\Livewire\Frontend\Calendar;

use Livewire\Component;
use App\Models\Reservation;

class Index extends Component
{
    public $date_from, $date_to, $events;

    public function mount()
    {
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->events = Reservation::where('status', 1)->get()->map(function ($event) {
            $startDateTime = $event->date_from;
            $endDateTime = $event->date_to;

            return [
                'title' =>  "RESERVED",
                'start' => $startDateTime,
                'end' => $endDateTime,
                'url' => route('reserved'),
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.frontend.calendar.index');
    }
}
