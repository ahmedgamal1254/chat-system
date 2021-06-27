<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Freind extends Component
{
    

    public function render()
    {
        $users=User::all();
        
        return view('livewire.freind',['users' => $users]);
    }
}
