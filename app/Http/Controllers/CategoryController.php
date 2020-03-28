<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller

{
    // Aaccès uniquement aux utilisateurs authentifiés
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
        // afficher la vue de tous les categories && créer un nouvelle catégorie
        $categories = Category::all();

        return view('categories.index')->with('categories',$categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
            'name'=>'required|max:50',
            
        ]);

        //Instanciation
        $categorie = new Category;
        
        $categorie->name = $request->name;
        $categorie->save();

        Session::flash('success', 'une nouvelle catégorie a été créée');

        //redirection vers la page index
        return redirect()->route('categories.index');

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
        // Récupérer la catégorie dans la base de donnée et l'affecter dans un variable
        $categorie = Category::find($id);

        // retourner la vue edit avec les deux  variables post & categories
        return view('categories.edit')->withCategorie($categorie); 
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
         //Valider les données
         $this->validate($request, [

            'name'=>'required'
            
        ]);
    //Sauvegarder donnée vers database
        $categorie = Category::find($id);
   
        $categorie->name = $request->input('name');

        $categorie->save();

    // flash data avec message de succes
        Session::flash('Success','Modification a été bien prise en charge!');

    //redirection vers categories.index
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          //Supprimer la catégorie à partir de son Id
          $categorie = Category::find($id);
          $categorie->delete();
          Session::flash('success', 'la catégorie a été bien supprimer');
          return redirect()->route('categories.index');
    }
}
