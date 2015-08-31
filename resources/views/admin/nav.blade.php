<h1>Admin</h1>
<ul class="nav nav-pills admin-pills">
	<li class="label-success">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Posts</a>
		<ul class="dropdown-menu">
			<li role="navigation" class="label-default"><a href="{{ url('/admin?approve=T') }}">Approve Posts?</a></li>
    		<li role="navigation" class="label-success"><a href="{{ url('/admin?approve=Y') }}">See Top Posts</a></li>
    		<li role="navigation" class="label-danger"><a href="{{ url('/admin?approve=N') }}">Rejected Posts</a></li>
		</ul>
	</li>
    	

    <li><a class="label-success" href="{{url('/admin/users')}}">Users</a></li>
    <li><a class="label-success" href="{{url('/admin/category')}}">Categories</a></li>
 </ul>
