@extends('main')

@section('title')
    <title>S'inscrire</title>
@endsection

@section('content')
    

    <div class="row">
        <div class="col-md-6 offset-md-3">

            <form action="" method="get">
                @csrf
                <div class="form-group ">
                    <label for="name">Nom:</label>
                    <input class="form-control" type="text" name="name" >
                </div>


                <div class="form-group ">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" name="email" >
   
                </div>
            
                <div class="form-group ">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" >
                </div>

                <div class="form-group ">
                    <label for="password-confirm">Confirm Password:</label>
                    <input class="form-control" type="password" name="password-confirm" >
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">S'inscire</button>
            </form>
        </div>

    </div>


@endsection