<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permet de supprimer toutes les données d’une table sans supprimer la table en elle-même. 
        Role::truncate();

        //Creation des roles utilisateurs
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'author']);
        Role::create(['name'=>'user']);
    }
}
