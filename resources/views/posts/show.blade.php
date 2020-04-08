@extends('main')
@section('title')
    <title>Affichage de l'article</title>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">

        <img src="/storage/images/{{$post->image}}" height="400" width="600" alt="">

        <h1>{{$post->title}}</h1>
        <p class="lead"> {!!$post->body!!}</p>

        <hr>
    <div class="tags">
        @foreach ($post->tags as $tag)
            <span class="badge badge-light">{{$tag->name}}</span>
        @endforeach
    </div>

    <div class="backend-comments" style="margin-top: 50px;">
        <h3>Commentaires <small>{{$post->comments()->count()}} totale</small></h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Commentaires</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($post->comments as $comment)
                <tr>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->email }}</td>
                <td> {{ $comment->comment }}</td>
                <td> <a href="{{route('comments.edit', $comment->id)}}" class="btn btn-xs btn-primary"> <span><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                  </svg></span></a>

                <a href="{{route('comments.delete', $comment->id)}}" class="btn btn-xs btn-danger"> <span><svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                  </svg></span></a>
                </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    </div>

   
    <div class="col-md-4">
        <div class="card card-body bg-light">
           <dl class="row">
               <dt class="col-sm-6">Créé à:</dt>
               <dd class="col-sm-6">{{ date('M j, Y H:i',strtotime($post->created_at)) }}</dd>
           </dl>

           <dl class="row">
                <dt class="col-sm-6">Dernière mise à jour:</dt>
                <dd class="col-sm-6">{{date('M j, Y H:i',strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr>

            <dl class="row">
                <dt class="col-sm-6">Catégorie:</dt>
            <dd class="col-sm-6">{{$post->category->name}}</dd>
            </dl>
            <hr>

            <div class="row">
                <div class="col-sm-6">

                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Modifier</a>
                </div>

                <div class="col-sm-6">
                    {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

                    {!! Form::close() !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <a href="{{route('posts.index')}}" class="btn btn-info btn-sm btn-block btn-spacing">Voir tous les Articles</a>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection