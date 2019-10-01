
<!DOCTYPE html>
<html>
<head>
	<title>Shura Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


        <style>
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
        .container{
            margin-top:50px;
        }
.tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative;
    list-style-type: none;
}
.tree ul ul {
    margin-left:.5em;
    list-style-type: none;

}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}

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
			<div class="panel-heading ">Employees</div>
	  		<div class="panel-body">

               <div class="row">
	  				<div class="col-md-6">

				         <ul id="tree">
				            @foreach($employees as $employee)
                            <a  style="text-decoration: none;color:red; font-size:20px"href="delete/{{$employee->id}}"><span aria-hidden="true">&times;</span></a>
                            <a  style="text-decoration: none;color:grean;"href="edit/{{$employee->id}}"><span >Edit</span></a>
				                <li>
				                    {{ $employee->username }}

				                    @if(count($employee->childs))
				                        @include('manageChild',['childs' => $employee->childs])
				                    @endif

                                </li>

				            @endforeach
				        </ul>
 <!-- form begin -->     </div>
          <div class="col-md-6">
           @include ("addNew")

             </div>
                         <!-- end of form -->


	  			</div>


	  		</div>
        </div>
    </div>

<script >
    $.fn.extend({
    treed: function (o) {

        var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };

        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
$('#tree').treed();


    </script>

</body>

</html>
