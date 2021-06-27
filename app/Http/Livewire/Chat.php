<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chat extends Component
{
    // public $messages
    public $user_id;

    public function mount($user_id){
        // $this->messages=$messages
        $this->user_id=$user_id;
    }

    public function render()
    {
        $data=DB::table('messages')->join('users', 'user_send', '=', 'users.id')
        ->where(function ($query){$query->where('messages.user_send','=',Auth::id())
        ->where('messages.user_recieve','=',$this->user_id);
        })
        ->orWhere(function ($query){$query->where('messages.user_send','=',$this->user_id)
            ->where('messages.user_recieve','=',Auth::id());
        })->select('users.name', 'users.gender', 'messages.*')->orderBy('id')->get(); 
        return view('livewire.chat',['messages' => $data]);
    }
}
