@extends('main')
@section('title')
   <title>Laravel Blog | Page d'accueil</title> 
@endsection
@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Bienvenue dans mon Blog</h1>
                <p class="text-muted">Merci de votre visite. Ceci est mon site test créer avec laravel</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Articles Populaires</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            @foreach ($posts as $post)
                
            
                <div class="post">
                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->body,0,300)}} {{strlen($post->body) > 300 ?'...' : ''}}</p>
                <a href="{{route('blog.single', $post->id)}}" class="btn btn-primary">Lire la suite</a>
                </div>

                <hr>

            @endforeach

            
        </div>

            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>
    </div>
@endsection


