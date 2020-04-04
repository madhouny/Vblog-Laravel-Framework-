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
        //Recupérer tous les tag depuis Tag Model
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
        //Retourner les vue show avec les tags 
        $tag = Tag::find($id);
        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Retourner la vue edit avec le tag correspondant à Id
        $tag = Tag::find($id);
        return view('tags.edit')->withTag($tag);
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
        //Récuperer le tag qui correspond à l'ID
       $tag = Tag::find($id);

       //Validation data
       $this->validate($request, [
           'name' =>'required|max:255'
       ]);
       $tag->name = $request->name;
       $tag->save();

       // afficher un message de success
       Session::flush('success', 'Tag Enrégistré avec Succés');
        
       // Redirection vers la page show du tag
       return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // récuperer chaque tag via son ID qui fait réference au Post Model
        $tag = Tag::find($id);
        $tag->posts()->detach();

        //Supprimer le tag
        $tag->delete();

        //Afficher un message flash et redirection vers  la page index 
        Session::flash('sucesss', 'Tag a été bien supprimé');
        return redirect()->route('tags.index');
    }
}
