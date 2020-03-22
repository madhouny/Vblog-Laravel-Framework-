@extends('main')

@section('title')
<title>Nouveau Article</title>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{URL::to('../../public/css/parsley.css')}}">
    
@endsection
    
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Créer un Nouveau Article</h1>
            <hr>
        <form data-parsley-validate class="form-group" action="{{route('posts.store')}}" method="post">
            @csrf
                <label  for="title">Titre :</label>
                <input required maxLength="100" class="form-control" type="text" name="title">

                <label  for="body">Corps de L'article :</label>
                <textarea required maxLength="1000" class="form-control" name="body" id="" cols="30" rows="10"></textarea>

                <br>
                <button class="btn btn-success btn-lg btn-block" > Ajouter un Article</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{URL::to('../../public/Javascript/parsley.min.js')}}"></script>
@endsection
    
