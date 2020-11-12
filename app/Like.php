<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function thread(){
        return $this->belongsTo(Thread::class);
    }

    protected $fillable=['user_id','thread_id','like'];
}
