@extends('main')

@section('title')
<title>{{ $post->title }}</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
        <hr>
        <p class="post-category"> Publié dans : {{$post->category->name}} </p>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <h3 class="comment-title"><span><svg class="bi bi-chat-dots-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 01-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm3 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
          </svg></span> {{$post->comments()->count() }} Commentaires</h3>
            @foreach ($post->comments as $comment)
               <div class="comment">
                   <div class="auteur-info">
                   <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="auteur-image">
                       <div class="auteur-name">
                            <h4>{{$comment->name}} </h4>
                            <p class="auteur-time">{{date('F nS, Y - g:iA',strtotime($comment->created_at)) }}</p>
                       </div>
                        
                    </div>
                   
                   <div class="comment-content">  {{ $comment->comment}} </div>            
               </div>
            @endforeach
        </div>

    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 offset-md-2">
        <form  action="{{route('comments.store', $post->id)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name"><strong>Nom:</strong></label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="col-md-6 form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="text" class="form-control" name="email">
                </div> 
                <div class="col-md-12 form-group">
                    <label for="comment"><strong>Commentaire:</strong></label>
                    <textarea name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                    <br>
                    <button type="submit" class="btn btn-success btn-block">Ajouter un Commentaire</button>
                </div>
            </div>

        </form>
        </div>
    </div>
@endsection