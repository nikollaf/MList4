@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$post->title}}</h1>
                <a href="{{$post->url}}" class="btn btn-lg btn-info">Visit</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
        	<div class="col-md-8">
                {!! Form::open(array('route' => 'vote', 'class' => 'form')) !!}
                <h4>Interesting.</h4>
                <p>Did you find this post interesting?</p>
                <div id="vote1"></div>

                <input type="hidden" name="post_id" value="{{$post->id}}"/>

                @if (Auth::check())
                    {!! Form::submit('Post!',
                    array('class'=>'btn btn-primary btn-success')) !!}
                    {!! Form::close() !!}
                @else
                    <a data-toggle="modal" class="btn btn-primary btn-success" data-target="#loginModal">Vote</a>
                @endif
        	</div>
        	<div class="col-md-4">
        		<h4>More from {{$post->category}}</h4>
                <ul class="list-unstyled">
                    @foreach ($posts as $post)
                        <li>{{$post['title']}}</li>
                    @endforeach
                </ul>
        	</div>
        </div>
    </div>
@endsection