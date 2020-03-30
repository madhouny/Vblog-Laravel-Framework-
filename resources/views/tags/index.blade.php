@extends('main')

@section('title')
    <title>Tous les Tags</title>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-8">
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
                        <td>{{ $tag->name }}</td>
                        
                        {{--<td> <a href="{{route('categories.edit', $categorie->id)}}" class="btn btn-info btn-sm">Modifier</a> <br>
                            <a class="col-sm-6">
                                {!! Form::open(['route'=>['categories.destroy',$categorie->id],'method'=>'DELETE']) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
            
                                {!! Form::close() !!}
                            </a> 
                        </td>--}}
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