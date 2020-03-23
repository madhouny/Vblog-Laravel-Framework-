<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Creer une variable qui regroupe tous les articles du blog
            $posts = post::all();

        // return view & passer la variable 
            return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valider les données
            $this->validate($request, [
                'title'=>'required|max:100',
                'body'=>'required|max:1000'
            ]);
        //Sauvgarder dans la Base de donner
                $post = new Post;
                $post->title = $request->title;
                $post->body = $request->body;

                $post->save();

                //Flash Messages
                Session::flash('success','Article a été sauvegardé avec succès!');

        //Rediriger vers autre page
            return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Trouver article à l'aide de son Id
        $post =  Post::find($id);

        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Trouver l'article dans la base du donnée et l'affecter dans un variable
        $post = Post::find($id);

        // return view edit avec la variable
        return view('posts.edit')->with('post',$post); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
