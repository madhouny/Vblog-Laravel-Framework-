@extends('main')
@section('title')
    <title>Page Blog</title>
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
        <div class="col-md-8 offset-md-2">
            <h1 class="blog-index">ARTICLES DU BLOG</h1>
        </div>
    </div>

    @foreach ($posts   as $post)
      
    <div class="row">
        <div class="col-md-8 offset-md-2 ">
            <h3 class="single-title">{{$post->title}}</h3>
            <h5 class="text-muted">Publié: {{ date('M j, Y', strtotime($post->created_at))}}</h5>
        <p>{{ substr(strip_tags($post->body),0,100) }}{{strlen(strip_tags($post->body)) > 80 ? '...' : ""}}</p>
        <a href=" {{route('blog.single', $post->id) }}" class="btn btn-primary"> Lire la suite</a>
        <br>
        <br>
        </div>
    </div>
    @endforeach
    
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>


@endsection