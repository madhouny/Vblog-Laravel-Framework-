<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    // Protéger le crud avec un middleware
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Récuprer tous les tag depuis Tag Model
        $tags = Tag::all();

        //Retourner la vue avec la variable $tags
        return view('tags.index')->with('tags',$tags);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation et définition des règles
        $this->validate($request,[
            'name'=>'required|max:255'
        ]);

        //Instancier la class Tag
        $tag = new Tag;
        $tag->name = $request->name;
        
        //Sauvegarder dans la base de donnée
        $tag->save();

        Session::flash('success', 'Un Nouveau Tag a été bien crée');

        //Redirection vers la page index
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
