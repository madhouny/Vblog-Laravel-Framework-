
 @extends('main')

@section('stylesheets')
    <style>
   body{
     background: url(/storage/images/about.jpg) no-repeat center center fixed; 
    background-size: cover;
   }
   
    </style>
@endsection

 @section('title')
   <title>About</title> 
@endsection
    
    
@section('content')
    <div class="row col-md-12">
    <h1 class="about-us">Ce Blog  est Réalisé par {{ $student }} , dans le cadre de la Formation {{$group}} </h1>

    <p class="about-body"> Dans le cadre de notre projet en programmation web côté serveur pour l’année 2019-2020, nous avons développé un blog en utilisant le Framework Laravel. Ce Blog permet aux utilisateurs d’écrire et de consulter des articles. Bien entendu un utilisateur peut s’enregistrer et devenir un membre actif du blog. </p>

    </div>
@endsection    
   
  
