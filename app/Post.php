<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Relation entre article et sa catégorie
    public function category(){
        return $this->belongsTo('App\Category');
    }

    //Relation entre article et tags
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    //Relation entre post et commentaire
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
