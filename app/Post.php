<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Relatoion entre article et sa catégorie
    public function category(){
        return $this->belongsTo('App\Category');
    }

    //Relation entre article et tags
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
