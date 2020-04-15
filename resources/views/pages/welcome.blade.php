@extends('main')
@section('title')
   <title>Laravel Blog | Page d'accueil</title> 
@endsection

@section('stylesheets')
    <style>
  body{
     background: url(/storage/images/login.png) no-repeat center center fixed; 
    background-size: cover;
   }

   
   
    </style>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            
            <h1 class="display-4">Bienvenue sur Notre Blog !</h1>
             <p class="text-muted">Merci de votre visite. Ce Blog est Crée avec Laravel Framework</p>
             <!--<div class="jumbotron bg-cover" >
             
                
            </div>-->
            <img src="/storage/images/CANVA.jpg" alt="" width="100%" height="80%">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">

            @foreach ($posts as $post)
                
            
                <div class="post">
                    <h3>{{$post->title}}</h3>
                    <p>{{substr(strip_tags($post->body),0,300)}} {{strlen(strip_tags($post->body)) > 300 ?'...' : ''}}</p>
                <a href="{{route('blog.single', $post->id)}}" class="btn btn-primary">Lire la suite</a>
                </div>

                <hr>

            @endforeach

            
        </div>
    </div>
@endsection


