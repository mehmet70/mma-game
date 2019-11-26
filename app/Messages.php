<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';
    protected $fillable = ['sender_id', 'receiver_id', 'msg'];
    public $timestamps = false;
}
