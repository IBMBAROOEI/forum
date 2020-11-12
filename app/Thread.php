<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable=['chanel_id','title','user_id','content'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
     return $this->hasMany(Answer::class);
   }

    public function chanel()
    {
        return $this->belongsTo(Chanel::class);
    }

    public function likes(){
        return $this->hasMany(like::class);
    }
}
