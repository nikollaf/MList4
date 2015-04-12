@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$post->title}}</h1>
                <a href="{{$post->url}}" class="btn btn-lg btn-success">Go</a>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-8">
        		
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