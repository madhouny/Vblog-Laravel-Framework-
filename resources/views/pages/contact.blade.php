
 @extends('main') 

 @section('title')
 <title>Contact</title> 
@endsection

@section('content')
    

     <div class="col-md-12" >
        <h1>Contact us</h1>
            <hr>
         <form action="" method="post">
                
            <div class="form-group ">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" >
             </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" aria-label="With textarea" >Tapez votre message !</textarea>
             </div>

            <button type="submit" class="btn btn-success">Envoyer</button>
        </form>
    </div>
@endsection   
