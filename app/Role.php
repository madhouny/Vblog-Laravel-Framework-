<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Relation Entre Role et User
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
