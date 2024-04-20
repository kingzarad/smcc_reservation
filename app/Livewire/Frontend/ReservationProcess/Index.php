<?php

namespace App\Livewire\Frontend\ReservationProcess;

use App\Models\Cart;
use Livewire\Component;
use App\Models\UserDetails;

class Index extends Component
{
    public $dsfrom;
    public $dsto;
    public $dsreturn;

    public function mount()
    {
        // Initialize date values
        $this->dsfrom = now()->format('Y-m-d');
        $this->dsto = now()->addDay()->format('Y-m-d');
        $this->dsreturn = now()->addDay(2)->format('Y-m-d');
    }

    public function render()
    {
        $users = UserDetails::where('user_id', auth()->user()->id)->first();
        $cartlists = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.reservation-process.index', ['users' => $users, 'cartlists' => $cartlists]);
    }

    public function goBack(){
        return $this->redirect('/cart', navigate: true);
    }


    public function ProcessSubmit(){

    }
}
