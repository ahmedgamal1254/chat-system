<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    private $user_id=1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::id() == 1){
            $this->user_id=2;
        }

        $user=User::where('id',$this->user_id)->first();
        return view('pages.index',['user' => $user,'user_id' => $this->user_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=null;
        $message=null;

        if($request->file('file')) {
            $request->validate([
                'file' => 'mimes:png,jpg,jpeg,mp4,mp3,csv,pdf|max:8192'
            ]); 
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $request->file('file')->storeAs('uploads', $fileName, 'public');

            $file=$fileName;
        }

        if($request->has('message')){
            $message=Request('message');
        }

        $data=new Message();
        $data->text=$message;
        $data->file=$file;
        $data->user_recieve=Request('recieve');
        $data->user_send=Auth::id();
        $data->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::where('id',$id)->first();
        return view('pages.chat',['user' => $user,'user_id' => $id]);
    }

    public function save(){
        $data=Request("select");

        foreach($data as $dd){
            DB::insert('insert into users_groups (user_id,group_id) values (?, ?)', [$dd,Request('selectgroup')]);
        }

        return redirect()->back();
    }
}
