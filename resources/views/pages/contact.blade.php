
 @extends('main') 

 @section('title')
 <title>Contact Us</title> 
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
    

     <div class="col-md-12" >
        <h1>Contact us</h1>
            <hr>
        
            <form action="{{route('postContact')}}" method="post">
                @csrf  
              <div class="form-group ">
                  <label for="email">Email</label>
                  <input class="form-control" type="text" name="email" value="{{Request::old('email')}}" >
               </div>
  
              <div class="form-group">
                  <label for="sujet">Sujet</label>
                  <input class="form-control" type="text" name="sujet" value="{{Request::old('sujet')}}">
              </div>
  
              <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="message" aria-label="With textarea"  > {{Request::old('message')}}</textarea>
               </div>
  
              <button type="submit" class="btn btn-success">Envoyer</button>
          </form>
    </div>
@endsection   
