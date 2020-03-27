@extends('main')
@section('title')
    <title>Blog</title>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach ($posts   as $post)
      
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>{{$post->title}}</h2>
            <h5 class="text-muted">Publié: {{ date('M j, Y', strtotime($post->created_at))}}</h5>
        <p>{{ substr($post->body,0,100) }}{{strlen($post->body) > 80 ? '...' : ""}}</p>

        <a href=" {{route('blog.single', $post->id) }}" class="btn btn-primary"> Lire la suite</a>
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