<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permet de supprimer toutes les données d’une table sans supprimer la table en elle-même. 
        User::truncate();
        DB::table('role_user')->truncate();

        //Récupérer les roles et les affecter aux variables
        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','author')->first();
        $userRole = Role::where('name','user')->first();

        //Creation du role admin
        $admin = User::create([
            'name'=>'Admin User',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('adminadmin')
        ]);
        
        //Creation du role auteur
        $author = User::create([
            'name'=>'Author User',
            'email'=>'author@author.com',
            'password'=> Hash::make('authorauthor')
        ]);

        //Creation du role user
        $user = User::create([
            'name'=>'Generic User',
            'email'=>'user@user.com',
            'password'=> Hash::make('useruser')
        ]);

        //Affectation des roles 
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
