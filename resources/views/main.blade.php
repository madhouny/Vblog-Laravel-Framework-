<!doctype html>
<html lang="en">

@include('partials.header')

<body>
  
@include('partials.nav')

  <br>
    


<div class="container">
 

  @include('partials.messages')
  
  @yield('content')
    
  @include('partials.footer')

</div> <!-- end of .container -->

   @include('partials.JS')

   @yield('scripts')
   
  </body>
</html>