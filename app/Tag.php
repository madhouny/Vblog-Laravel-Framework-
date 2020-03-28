<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Relation entre tag et articles
    public function posts(){
        return $this->belongsToMany('App\Post');
    }

}
