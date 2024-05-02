<?php

namespace App\Livewire\Frontend;

use App\Models\UserDetails;
use Livewire\Component;

class NavbarHello extends Component
{
    public function render()
    {
        $user = UserDetails::where('users_id',  auth()->user()->id)->first();
     
        return view('livewire.frontend.navbar-hello', ['user'=>$user]);
    }
}
