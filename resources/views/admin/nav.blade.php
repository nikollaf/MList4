<h1>Admin</h1>
<ul class="nav nav-pills admin-pills">
    <li role="navigation" class="label-default"><a href="{{ url('/admin?approve=T') }}">Approve Posts?</a></li>
    <li role="navigation" class="label-success"><a href="{{ url('/admin?approve=Y') }}">See Top Posts</a></li>
    <li role="navigation" class="label-danger"><a href="{{ url('/admin?approve=N') }}">Reject Posts</a></li>
 </ul>
