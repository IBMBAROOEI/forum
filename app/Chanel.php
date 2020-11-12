<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chanel extends Model
{

    protected $fillable=['name'];
    public  function  threadchanel(){
         return $this->hasMany( Thread::class);
    }
}
