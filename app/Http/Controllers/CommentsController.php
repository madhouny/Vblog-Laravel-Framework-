<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Session;

class CommentsController extends Controller
{

    //Protéger la route avec un middleware , sauf la fonction Store.
    public function __construct(){
        $this->middleware('auth', ['except'=>'store']);
    }


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

        Session::flash('success', 'Commentaire ajouté avec succès');
        return redirect()->back();

    }

    public function edit($id){
        // Récuperer le commentaire avec son ID et retourner la page edit  
        $comment = Comment::find($id);
        return view('comments.edit')->with('comment', $comment);

    }

    public function update(Request $request,$id){
        //Récuperer le commentaire par son ID
        $comment = Comment::find($id);

        // validate data
        $this->validate($request, array('comment'=>'required'));

        //Mettre à jour la variable $comment
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Commentaire mis à jour avec succès');
        return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id){
        //Récuperer le commentaire via son ID et le retourner dans la vue delete
        $comment = Comment::find($id);
        return view('comments.delete')->with('comment', $comment);
    }

    public function destroy($id){

        //Récuperer le commentaire depuis la base de donnée et le supprimer
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();


        // redirection vers la page show avec le flash Message
        Session::flash('success', 'Commentaire supprimé avec succès');
        return redirect()->route('posts.show', $post_id);


    }
    
    
}
