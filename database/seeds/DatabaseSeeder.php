<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        // Appeler à chaque fois RolesTablesSeeder
        $this->call(RolesTablesSeeder::class);

        // Appeler à chaque fois UsersTableSeeder
        $this->call(UsersTableSeeder::class);
    }
}
