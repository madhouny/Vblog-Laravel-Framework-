@extends('main')

@section('title')
<title>{{$post->title}}</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
        <hr>
        <p>Publié dans : {{$post->category->name}}</p>
        </div>
    </div>
@endsection