@extends('main')

@section('title')
    <title>Modifier l'article du blog</title>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{URL::to('../../public/css/parsley.css')}}">
    <script src="https://cdn.tiny.cloud/1/8eq79l746qnxp5t0xhqk6rp52ybrquybwyxc0l6h89ivw5td/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
          selector: 'textarea',
         
        });
      </script>
    
@endsection


@section('content')
<div class="row">

    <div class="col-md-8 ">
    
    <form data-parsley-validate  class="form-group" action="{{route('posts.update', $post->id)}}" method="post">
        @csrf
        @method('PUT')
            <label  for="title"><Strong> Titre :</strong></label>
            <input required maxLength="100" class="form-control form-control-lg" type="text" name="title" value="{{$post->title}}">
            <br>
            <label  for="category_id"><Strong> Catégorie :</strong></label>
                <select class="form-control" name="category_id" >
                    @foreach ($categories as $categorie)
                       <option value="{{$categorie->id}}">{{$categorie->name}}</option>    
                   @endforeach
               
               </select>   


            <label  for="tags"><Strong> Tags :</strong></label>
                <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple" >
                    @foreach ($tags as $tag)
                       <option value="{{$tag->id}}"> {{$tag->name}}</option>    
                   @endforeach
               
               </select>      

            <label class="form-spacing-top" for="body"><strong> Body :</strong></label>
            <textarea required maxLength="1000" class="form-control" name="body" id="" cols="30" rows="10" >{{ $post->body}}
            </textarea>
    
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
                    {{Form::submit('Save  Changes', ['class'=>'btn btn-success btn-block']) }}
    
                </div>
            </div>

        </div>
    </div>
</form>
</div> 
@endsection

@section('scripts')

<script type="text/javascript">
    
    $('.js-example-basic-multiple').select2();
   

</script>
@endsection