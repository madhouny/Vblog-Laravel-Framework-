@extends('main')

@section('title')
    <title>Modifier Tag</title>
@endsection

@section('content')
    {{ Form::model($tag, ['route'=>['tags.update', $tag->id ], 'method'=>"PUT"]) }} 

    {{ Form::label('name',"Titre") }}
    {{ Form::text('name', null, ['class'=>'form-control'])}}

    {{ Form::submit('Enregistrer les changements', ['class' => 'btn btn-success' , 'style' =>'margin-top:20px'] ) }}

    {{ Form::close() }}
@endsection