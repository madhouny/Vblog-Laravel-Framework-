<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        return view('pages.welcome');
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
