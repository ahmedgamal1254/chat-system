<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user=User::whereNotIn('id',[Auth::id()])->get();
        return view('pages.index',['users' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::whereNotIn('id',[Auth::id()])->get();
        return view('pages.chat',['users' => $user]);
    }

    public function save(){
        $data=Request("select");

        foreach($data as $dd){
            DB::insert('insert into users_groups (user_id,group_id) values (?, ?)', [$dd,Request('selectgroup')]);
        }

        return redirect()->back();
    }
}
