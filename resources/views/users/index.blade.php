@extends('main')

@section('title')
    <title> User Management</title>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
             <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
             </thead> 
             <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th> {{ $user->id }} </th>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                         <td> <a href="{{route('users.edit', $user->id)}}"><button type="button" class="btn btn-primary">Modifier</button> </a>
                           <a href="{{route('users.destroy', $user->id)}}" ><button type="button" class="btn btn-warning">Supprimer</button> </a>
                        </td>
                        
                    </tr>
                @endforeach     
            
            
            </tbody>  
        </table>
    </div>
</div>
@endsection