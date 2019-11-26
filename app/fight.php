<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fight extends Model
{
    protected $table = 'fight';
    public $timestamps = false;
    protected $fillable = ['sender_id', 'receiver_id', 'winner_id', 'status'];

}
