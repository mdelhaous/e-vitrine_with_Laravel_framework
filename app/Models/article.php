<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded=[];
    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function user()
    {

       // return $this->belongsTo('App\User');
        return $this->belongsToMany('\App\User')->withTimestamps();
    }
}