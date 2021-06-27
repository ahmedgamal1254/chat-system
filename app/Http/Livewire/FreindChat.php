<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FreindChat extends Component
{
    public $user;
    public $user_id;

    public function mount(User $user,$user_id){
        $this->user=$user;
        $this->user_id=$user_id;
    }

    public function render()
    {
        $count_msg=DB::table('messages')->join('users', 'user_send', '=', 'users.id')->where(function ($query){
            $query->where('messages.user_send','=',Auth::id())->where('messages.user_recieve','=',$this->user_id);
        })->orWhere(function ($query){
            $query->where('messages.user_send','=',$this->user_id)->where('messages.user_recieve','=',Auth::id());
        })->select('users.name', 'users.gender', 'messages.*')->count();
        return view('livewire.freind-chat',['count' => $count_msg]);
    }
}
