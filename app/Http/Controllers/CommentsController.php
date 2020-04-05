<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Session;

class CommentsController extends Controller
{
    public function store(Request $request, $post_id)
    {
        //Validation data
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'comment'=>'required|min:10|max:1000',
            
           
        ]);

        //Sauvgarder les données dans la base de donnée
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment= $request->comment;
        $comment->approved = true;
        
        // associer id_post au commentaire
        $post = Post::find($post_id);
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Commentaire a été bien ajouté');
        return redirect()->back();



    }
    
    
}
