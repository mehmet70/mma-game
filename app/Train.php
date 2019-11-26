<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $table = 'train';
    protected $fillable = ['user_id', 'status', 'points'];
    public $timestamps = false;
}
