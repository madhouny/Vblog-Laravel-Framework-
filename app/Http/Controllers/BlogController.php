<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //récupérer tous les articles, 10 articles par pages
    public function getIndex(){
        $posts = Post::paginate(10);

        return view('blog.index')->with('posts',$posts);
    }

    
}
