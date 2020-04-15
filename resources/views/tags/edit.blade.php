@extends('main')

@section('title')
    <title>Modifier Tag</title>
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
    {{ Form::model($tag, ['route'=>['tags.update', $tag->id ], 'method'=>"PUT"]) }} 

    {{ Form::label('name',"Titre") }}
    {{ Form::text('name', null, ['class'=>'form-control'])}}

    {{ Form::submit('Enregistrer les changements', ['class' => 'btn btn-success' , 'style' =>'margin-top:20px'] ) }}

    {{ Form::close() }}
@endsection