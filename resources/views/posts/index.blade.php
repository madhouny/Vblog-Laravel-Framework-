@extends('main')

@section('title')
    <title>Tous les Articles</title>
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
            <h1>Tous les Articles</h1>    
        </div>
        <div class="col-md-3">
            <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-spacing">Nouveau Article</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <hr>

    </div><!-- end of row -->
    
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                 <thead>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Crée à</th>
                 </thead> 
                 <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <th> {{ $post->id }} </th>
                            <td> {{$post->title}} </td>
                            <td> {{substr(strip_tags($post->body), 0 , 50)}} {{(strlen(strip_tags($post->body)) > 50 ? "..." : "")}}</td>
                            <td> {{ date('M j, Y', strtotime($post->created_at)) }} </td>
                            @can('manage-users')
                            <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-info btn-sm">Consulter</a>
                                
                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-light btn-sm">Modifier</a>
                            </td>
                                @endcan
                        </tr>
                    @endforeach     
                
                
                </tbody>  
            </table>

            <div class="text-center">
               {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection