@extends('main')

@section('title')
    <title> User Management</title>
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
    <div class="col-md-12">
        <table class="table">
             <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
             </thead> 
             <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th> {{ $user->id }} </th>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>

                         <td>
                            @can('delete-users')
                            <a href="{{route('users.edit', $user->id)}}"><button type="button" class="btn btn-primary" class="float-left" style="margin-left:5px"> Modifier</button> </a>
                            @endcan

                            @can('delete-users')            
                           <form action="{{route('users.destroy', $user)}} " method="POST" class="float-left" >
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-warning">Supprimer</button> 
                            </form> 
                            @endcan
                        </td>
                        
                    </tr>
                @endforeach     
            
            
            </tbody>  
        </table>
    </div>
</div>
@endsection