<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Récupérer les Users et les retourner dans la vue index
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Récuperer tous les roles 
        $roles = Role::all();

        //retourner la vue edit avec le role et Id de l'user
        return view('users.edit')->with([
            'user'=>$id,
            'roles'=>$roles
        ]);
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
        //Récuperer l'user par son ID
        $user = User::find($id);
        // Créer des associations de type "Many to many
        $user->roles()->sync($request->roles);

         //Afficher un flash message et redirection vers la page index
         Session::flash('success', 'Role Utilisateur Modifié');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
         //Récuperer l'user par son ID
         $user = User::find($id);
         
        //supprimer la relation d'entité entre user et son role
        $user->roles()->detach();
        $user->delete();

        //Afficher un flash message et redirection vers la page index
        Session::flash('success', 'Role Utilisateur Supprimer');

        // redirection vers la page index
        return redirect()->route('users.index');
    }
}
