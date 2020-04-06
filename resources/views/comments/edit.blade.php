@extends('main')

@section('title')
    <title>Modifier Commentaire</title>
@endsection

@section('content')

<div class="col-md-8 offset-md-2">
    <h2>Modifier Commentaire</h2>

    {{ Form::model($comment, ['route'=> ['comments.update', $comment->id], 'method'=>'PUT']) }}

    {{ Form::label('name', 'Nom:') }}
    {{ Form::text('name', null, ['class'=>'form-control','disabled'=>'disabled']) }}

    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email', null, ['class'=>'form-control','disabled'=>'disabled']) }}

    {{ Form::label('comment', 'Commentaire:') }}
    {{ Form::textarea('comment', null, ['class'=>'form-control']) }}
    <br>
    {{ Form::submit('Mettre à jour', ['class'=>'btn btn-block btn-success']) }}

    {{ Form::close() }}

</div>
@endsection