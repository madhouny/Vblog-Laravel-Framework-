@extends('main')

@section('title')
    <title> Suppression du Commentaire </title>
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2">
       <h2>Supprimer Ce Commentaire ?</h2> 
       <p>
           <strong>Nom:</strong> {{$comment->name}} <br>
           <strong>Email:</strong> {{$comment->email}} <br>
           <strong>Commentaire:</strong> {{$comment->comment}}
       </p>

       {{Form::open(['route'=>['comments.destroy',$comment->id], 'method'=>'DELETE'])}}
        {{Form::submit('Supprimer ce Commentaire', ['class'=>'btn btn-lg btn-block btn-danger'])}}
       {{Form::close()}}
    </div>

</div>

    
@endsection