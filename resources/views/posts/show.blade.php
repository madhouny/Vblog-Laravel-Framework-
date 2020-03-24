@extends('main')
@section('title')
    <title>Affichage de l'article</title>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{$post->title}}</h1>
        <p class="lead"> {{$post->body}}</p>
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