@extends('main')

@section('title')
<title> Modifier </title>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
    <form class="form-group" action="{{route('users.update', $user)}}" method="post">
        @csrf
        @method('PUT')

        @foreach ($roles as $role)
            <div class="form-check">
                <input type="checkbox" name="roles[]" value="{{$role->id}}">
            <label  for="">{{$role->name}}</label>
            </div>
        @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
</div>
@endsection