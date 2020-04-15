<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         //Définir les Roles  utilisateurs  on utilisant Gates Façade seulement pour admin et Auteur  
         Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin','author']);
        });

        //Définir le Role  utilisateur ADMIN et Author on utilisant Gates Façade pour permettre editer un utilisateur et gérer certains fonctionnalités du blog
        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['admin','author']);
        });

          //Définir le Role  utilisateur ADMIN on utilisant Gates Façade pour permettre supprimer un utilisateur et gérer tous le blog
          Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

       
    }
}
