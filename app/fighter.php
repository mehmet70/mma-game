<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fighter extends Model
{
    protected $table = 'fighter';
    protected $fillable = ['firstname', 'characterurl', 'lastname', 'background', 'win', 'loss'];
    public $timestamps = false;
}
