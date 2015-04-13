<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="{{ asset('/stylesheets/styles.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <div class="top-bar">
        <div class="container-fluid">
            <p>The place for social and creative outlet for Muslim millenials to share the best posts.</p>
        </div>
    </div>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">MList</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a data-toggle="modal" data-target="#loginModal">Login</a></li>
					@else
                        <li>
                            <button type="button" class="btn btn-add" data-toggle="modal" data-target="#postModal">
                               <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

    @if (isset($message))
    <div class="message">
        <div class="alert alert-info">
            {{$message}}
        </div>
    </div>
    @endif


	@yield('content')

	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ asset('/js/custom.js') }}"></script>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Please Log In</h3>
                    
                </div>
                <div class="modal-body">
                    <a href="{{ url('/login/twitter') }}" class="btn btn-block btn-twitter">
                        <i class="ion-social-twitter"></i> Sign in with Twitter
                    </a>
                    <a href="{{ url('/login/facebook') }}" class="btn btn-block btn-facebook">
                        <i class="ion-social-facebook"></i> Sign in with Facebook
                    </a>
                    <p class="hint">We will not post anything to your social network or share any of your information.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Post</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li></li>
                        @endforeach
                    </ul>

                    {!! Form::open(array('route' => 'post_store', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('Title') !!}
                        {!! Form::text('title', null,
                        array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Title')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Url') !!}
                        {!! Form::url('url', null,
                        array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Url')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Category') !!}
                        {!! Form::text('category', null,
                        array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Category')) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Post!',
                    array('class'=>'btn btn-primary')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</body>
</html>
