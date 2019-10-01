
<!DOCTYPE html>
<html>
<head>
	<title>Shura Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


        <style>
        .container{
            margin-top:50px;
        }
        * {
        margin: 0;
        padding: 0;
        }
        body{
            font-style: italic;
            font-family: cursive;
            height:100vh;
        }

        .logo-img{
        float: left;
        color: #ffff;
        width:30%;
        line-height: 50px;
        }
        .nav{
            width:100%;
            height: 50px;
            background-color:#373331;
        }
        .nav ul {
        list-style-type: none;
        float: right;
        color: #ffff;
        width:30%;
        line-height: 50px;

        }

        .nav ul li {
        float: left;
        margin-right: 20px;
        transition: all 1s ease;

        }
        .nav ul li:hover{

            color:lightgreen;
}


        .container1 {
        width:80%;
        margin:auto;}

        </style>
</head>

<body>
<div class="nav">
       <div class="container1">
            <div class="logo-img">
               Shura Task
            </div>
             <ul>

 <li> <a style="color: #ffff;text-decoration:none;" href="{{url('/logout')}}">logout</a></li>
            </ul>
       </div>
   </div>
	<div class="container">


		<div class="panel panel-primary">
			 <div class="panel-heading ">Edit Employee</div>
	  		<div class="panel-body">

               <div class="row">
	  				<div class="col-md-6">
<!-- ----------------form -->

              <br>
            <form action="/successlogin/edit/{{$employee->id}}" method="POST">
             {{csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" value="{{$employee->name}}"id="inputName" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group {{ $errors->has('username') ? 'has-error':''}} col-md-6">
                    <label for="inputUserName">UserName</label>
                    <input type="text" class="form-control" value="{{$employee->username}}"id="inputUserName" name="username" placeholder="UserName"required>
                     </div>
                     <div class="form-group {{ $errors->has('password') ? 'has-error':''}} col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" value="{{$employee->password}}"id="inputPassword4"name="password" placeholder="Password"required>
                    </div>

                <div class="form-group col-md-6">
                    <label for="inputTitle">Title</label>
                    <input type="text" class="form-control" value="{{$employee->title}}"id="inputTitle"name="title" placeholder="Enter Title"required>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputBirth">Birth Date</label>
                    <input type="date" class="form-control" value="{{$employee->birth_date}}"id="inputBirth" name="birth_date" required>
                    </div>
                    <div class="form-group col-md-3">
                    <label for="inputChild">No of children</label>
                    <input type="number"  class="form-control" value="{{$employee->no_of_childrens}}"id="inputChild"  name="no_of_childrens"min='0'required>
                    </div>
                    <div class="form-group col-md-3">
                     <label for="inputSub">Supervisor ID</label>
                     <input type="number"  class="form-control" value="{{$employee->sub_id}}"id="inputSub"name="sub_id" min='0'required>
                    </div>
                    <div class="col-md-12 ">

                            @if(count($errors))
                             <div class="alert alert-danger">
                                <ul >
                                @foreach($errors->all() as $error)
                                <li > {{$error}}</li>
                                @endforeach
                                </ul>
                             </div>
                            @endif
                                  <!-- alert -->
                                  @if($message=Session::get('e'))
      <div class="alert alert-success">
  <strong>done Added !!</strong>

</div>
      @endif
                                  <!--  -->
                    <button type="submit" class="btn btn-primary ">Submit</button>

                     </div>
                </div>

        </form>
      </div>
   </div>
  </div>
</div>
