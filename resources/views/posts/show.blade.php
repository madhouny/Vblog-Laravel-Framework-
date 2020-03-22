@extends('main')
@section('title')
    <title>Affichage de l'article</title>
@endsection

@section('content')

<h1>{{$post->title}}</h1>
    <p class="lead"> {{$post->body}}</p>
@endsection