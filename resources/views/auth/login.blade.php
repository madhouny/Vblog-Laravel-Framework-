@extends('main')
@section('title')
    <title>Login</title>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3" >
            
            <form action="" method="get">
                @csrf
                <div class="form-group ">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" name="email" >
                </div>


                <div class="form-group ">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" >
   
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" >
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>



@endsection