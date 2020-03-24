<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    public function getIndex(){

        //récupérer les derniers articles depuis database
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->with('posts',$posts);
    }

    public function getAbout(){
        $group = 'MIASHS BLOG';
        $student = 'By Juba , Sylvain ,Youness';
        return view('pages.about')->with('group',$group)->with('student',$student);
    }

    public function getContact(){
        return view('pages.contact');
    }
}
