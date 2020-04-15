<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Mail;
use Session;
class PagesController extends Controller
{
    public function getIndex(){

        //récupérer les 3 derniers articles depuis database , 
        $posts = Post::orderBy('created_at','desc')->limit(3)->get();
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

    
    public function postContact(Request $request){
        //Validation data
        $this->validate($request, [
            'email'=>'required|email',
            'sujet'=>'required|min:3',
            'message'=>'required|min:10'
            ]);

    $data = array(
        'email'=> $request->email,
        'sujet'=> $request->sujet,
        'bodyMessage'=> $request->message
    );

    //Envoyer les Email on utilisant façade Mail et Mailtrap.io configuré dans .env

    //Mail::send('view', $data, function())
    Mail::send('emails.contacts', $data, function($message) use($data){
            $message->from($data['email']);
            $message->to('younes.madhoun@gmail.com');
            $message->subject($data['sujet']);
    });


    //Affichage du Message dans la vue contact
    Session::flash('success', 'Votre Email a été Envoyé');
    return redirect()->back();
}
}
