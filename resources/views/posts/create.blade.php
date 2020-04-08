@extends('main')

@section('title')
<title>Créer un Nouveau Article</title>
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
        <div class="col-md-8 col-md-offset-2">
            <h1>Créer un Nouveau Article</h1>
            <hr>
        <form data-parsley-validate class="form-group" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <label  for="title"><strong>Titre</strong> :</label>
                <input required maxLength="100" class="form-control" type="text" name="title">

                <label for="categorie_id"><strong>Catégorie</strong> :</label>
                <select class="form-control" name="category_id" >
                     @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>    
                    @endforeach
                
                </select>

                <label for="tags"><strong>Tags</strong> :</label>
                <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                     @foreach ($tags  as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>    
                    @endforeach
                
                </select>

                {{Form::label('image', 'Upload Image')}}

                {{Form::file('image')}}
                <br>
                
                <label  for="body"><strong>Corps de L'article :</strong></label>
                <textarea  maxLength="1000" class="form-control" name="body" id="" cols="30" rows="10"></textarea>
                <br>
                <button class="btn btn-success btn-lg btn-block" > Ajouter un Article</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{URL::to('../../public/Javascript/parsley.min.js')}}"></script>

<script type="text/javascript">
    
    $('.js-example-basic-multiple').select2();

</script>
@endsection
    
