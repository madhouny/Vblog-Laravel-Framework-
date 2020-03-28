@extends('main')

@section('title')
    <title>Modification Catégories</title>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-8">
            <div class="card card-body bg-light">
            <form  action="{{route('categories.update', $categorie->id)}}" method="post">
                @csrf
                @method('PUT')

                <h2>Modifier Catégorie</h2>
                <div class="form-group">
                    <label for="name"><strong>Nom : </strong></label>
                    <input class="form-control" type="text" name="name" value="{{$categorie->name}}">
                </div>

                <button type="submit" class="btn btn-success">Modifier</button>

            </form>
            </div>
        </div>
    </div>


@endsection