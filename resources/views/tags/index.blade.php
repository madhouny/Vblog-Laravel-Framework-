@extends('main')

@section('title')
    <title>Tous les Tags</title>
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
    
    <div class="row">
        <div class="col-md-9">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                      
                    <tr>
                        <th>{{ $tag->id }}</th>
                    <td> <a href="{{route('tags.show', $tag->id)}}">{{ $tag->name }}</a> </td>
                        
                    <td> <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm">Modifier</a> <br>
                         
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-light">
            <form  action="{{route('tags.store')}}" method="post">
                @csrf
                <h2>Nouveau Tag</h2>
                <div class="form-group">
                    <label for="name"><strong>Nom : </strong></label>
                    <input class="form-control" type="text" name="name">
                </div>

                <button type="submit" class="btn btn-success">Créer Un Nouveau Tag</button>

            </form>
            </div>
        </div>
    </div>


@endsection