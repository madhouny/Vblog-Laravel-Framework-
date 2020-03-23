@extends('main')

@section('title')
    <title>Modifier l'article du blog</title>
@endsection


@section('content')
<div class="row">

    <div class="col-md-8 ">
    
    <form  class="form-group" action="{{route('posts.update', $post->id)}}" method="post">
        @csrf
            <label  for="title"><Strong> Titre :</strong></label>
            <input  class="form-control form-control-lg" type="text" name="title" value="{{ old('title')?old('title') : $post->title}}">

            <label class="form-spacing-top" for="body"><strong> Body :</strong></label>
            <textarea  class="form-control" name="body" id="" cols="30" rows="10" value="{{ old('body')?old('body') : $post->body}}">
            </textarea>
    </form>
    </div>
    <div class="col-md-4 form-margin-top">
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

                <a href="{{route('posts.show', $post->id)}}" class="btn btn-danger btn-block">Annuler</a>
                </div>

                <div class="col-sm-6">
                <a href="{{route('posts.update', $post->id)}}" class="btn btn-success btn-block">Enregistrer</a>
                </div>
            </div>

        </div>
    </div>
</div> 
@endsection