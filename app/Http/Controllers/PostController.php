<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Image;
use Storage;

class PostController extends Controller
{
    //Protéger l'accés avec un Middleware 
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
        //Creer une variable qui regroupe tous les articles du blog limiter à 5 par pages,
            $posts = post::paginate(5);

        // retourner la vue & passer la variable dans la vue
            return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //récuperer tous les categories et les affecter à la variable $categories
        $categories = Category::all();

        //récuperer tous les tags et les affecter à la variable $tags
        $tags = Tag::all();

        //retourner la vue create avec la varibale $categories
        return view('posts/create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Valider les données saisie 
            $this->validate($request, [
                'title'=>'required|max:100',
                'body'=>'required|max:1000',
                'category_id'=>'required|integer',
                'image'=>'image|nullable|max:1999'

            ]);
                //Sauvgarder les données dans database
                $post = new Post;
                $post->title = $request->title;
                $post->body = $request->body;
                $post->category_id = $request->category_id;

                //Save our Image
                if($request->hasFile('image')){
                    // Avoir filename avec l'extension
                    $image = $request->file('image')->getClientOriginalName();
                    // Avoir seulement le nom du fichier
                    $filename= pathinfo($image, PATHINFO_FILENAME);
                    //récupérer seulement l'extension
                    $extension = $request->file('image')->getClientOriginalExtension();
                    //filename à sauvegarder
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

                }else{

                    $fileNameToStore = 'noimage.jpg';
                }

                $post->image = $fileNameToStore;
                $post->save();

                //affeceter les tags au posts
                $post->tags()->sync($request->tags, false);


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
        //récupérer l'article à travers son Id
        $post =  Post::find($id);

        //Retourner la vue de l'article
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
        // Récupérer l'article dans la base de donnée et l'affecter dans un variable
        $post = Post::find($id);

        //Récupérer les articles depuis le model Category
        $categories = Category::all();
        
        //Récupérer les tags depuis le model Tags
        $tags = Tag::all();
        
        // retourner la vue edit avec les trois  variables post & categories et tags
        return view('posts.edit')->with('post',$post)->withCategories($categories)->with('tags',$tags); 
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
                'title'=>'required|max:100',
                'body'=>'required|max:1000',
                'category_id'=>'required|integer',
                'image'=>'image|nullable|max:1999'
            ]);
        //Sauvegarder donnée vers database
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->category_id =$request->input('category_id');
            
            if($request->hasFile('image')){
                //Ajouter les nouvelles images
                   // Avoir filename avec l'extension
                   $image = $request->file('image')->getClientOriginalName();
                   // Avoir seulement le nom du fichier
                   $filename= pathinfo($image, PATHINFO_FILENAME);
                   //récupérer seulement l'extension
                   $extension = $request->file('image')->getClientOriginalExtension();
                   //filename à sauvegarder
                   $fileNameToStore = $filename.'_'.time().'.'.$extension;
                   // Upload Image
                   $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

                   //Recupérer les anciens photos
                   $oldFileName = $post->image;
                   //Update database
                     $post->image = $fileNameToStore;
                    //Supprimer les anciens photos
                    Storage::delete($oldFileName); 

               }
            
            $post->save();

            $post->tags()->sync($request->tags);
           

        // flash data avec message de succes
            Session::flash('Success','Article a été sauvegardé avec succès!');

        //redirection vers posts.show
            return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //recupérer l'article à partir de son Id
        $post = Post::find($id);

        //récuperer les articles référent a leurs tags
        $post->tags()->detach();

        //Supprimer image relative à l'article
        Storage::delete('public/images/'.$post->image);


        //Supprimer les articles
        $post->delete();

        //Afficher un flash message et redirection vers la page index
        Session::flash('success', 'l article à été bien supprimer');
        return redirect()->route('posts.index');
    }
}
