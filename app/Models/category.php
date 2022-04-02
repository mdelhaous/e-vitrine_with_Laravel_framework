<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    
    protected $guarded=[];
    
    public function categorys(){
        return $this->hasMany('App\Category');
    }

    public function user()
    {
        //return $this->belongsTo('App\User');
        return $this->belongsToMany('\App\User')->withTimestamps();
    }
}
