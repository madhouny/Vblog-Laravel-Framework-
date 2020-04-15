@extends('main')

@section('title')
    <title>Tous les Catégories</title>
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
        <div class="col-md-9" >
            <h1>Catégories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $categorie)
                      
                    <tr>
                        <th>{{ $categorie->id }}</th>
                        <td> <a href="{{route('categories.edit', $categorie->id)}}">{{ $categorie->name }}</a> </td>        
                        <td>    
                            @can('delete-users')
                              
                                {!! Form::open(['route'=>['categories.destroy',$categorie->id],'method'=>'DELETE', ]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm  float-left']) !!}
            
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3" >
            <div class="card card-body bg-light">
            <form  action="{{route('categories.store')}}" method="post">
                @csrf
                <h2>Nouvelle Catégorie</h2>
                <div class="form-group">
                    <label for="name"><strong>Nom : </strong></label>
                    <input class="form-control" type="text" name="name">
                </div>

                <button type="submit" class="btn btn-success">Créer Une Nouvelle Catégorie</button>

            </form>
            </div>
        </div>
    </div>


@endsection