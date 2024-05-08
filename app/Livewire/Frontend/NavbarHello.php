<?php

namespace App\Livewire\Frontend;

use App\Models\UserDetails;
use Livewire\Component;

class NavbarHello extends Component
{
    public function render()
    {
        $user = UserDetails::where('users_id',  auth()->user()->id)->first();
        $name_str = "";
        if(!empty($user->positionDetails->position_name)){
            $name = ucfirst($user->firstname);
            // if (!empty($user->middlename)) {
            //     $name .= " " . ucfirst($user->middlename);
            // }
            // $name .= " " . ucfirst($user->lastname);
            $name_str = $user->positionDetails->position_name . " " . $name;
        }
        return view('livewire.frontend.navbar-hello', ['name_str'=>$name_str]);
    }
}
