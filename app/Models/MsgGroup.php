<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsgGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', 'file','user_send','group_id'
    ];

    protected $hidden = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
