<ul>
@foreach($childs as $child)
<a style="color:red;font-size:20px"href="delete/{{$child->id}}"><span aria-hidden="true">&times;</span></a>
<a  style="text-decoration: none;color:grean;"href="edit/{{$child->id}}"><span >Edit</span></a>
	<li>
	    {{ $child->username}}

	@if(count($child->childs))
            @include('manageChild',['childs' => $child->childs])
        @endif

	</li>

@endforeach
</ul>
