<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <title>Shura Task</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <link  href="style.css" rel="stylesheet" type="text/css">

    </head>
    <body>
    <div class="nav">
       <div class="container">
            <div class="logo-img">
               Shura Task
            </div>
             <ul>
                 <li>Home Page</li>


            </ul>
       </div>
   </div>


<div class="wrapper fadeInDown">
  <div id="formContent">

      @if($message=Session::get('error'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{$message}}</strong>

</div>
      @endif
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="user.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="{{url('/checklogin')}}" method="post">
         {{csrf_field() }}
      <input type="text" id="login" value="{{old('username')}}" class="fadeIn second" name="username" placeholder="username">

      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
@if(count($errors))
<ul style="list-style-type:none">
@foreach($errors->all() as $error)
   <li style="color:red"> {{$error}}</li>
@endforeach
</ul>

@endif
 </div>
</div>

    </body>
</html>
