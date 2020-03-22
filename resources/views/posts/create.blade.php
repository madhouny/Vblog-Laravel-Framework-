@extends('main')

@section('title')
<title>Nouveau Article</title>
@endsection
    
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Créer un Nouveau Article</h1>
            <hr>
        <form class="form-group" action="{{route('posts.store')}}" method="post">
            @csrf
                <label  for="title">Titre :</label>
                <input class="form-control" type="text" name="title">

                <label  for="body">Corps de L'article :</label>
                <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>

                <br>
                <button class="btn btn-success btn-lg btn-block" > Ajouter un Article</button>
            </form>

        </div>

    </div>
@endsection
    
