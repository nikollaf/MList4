@extends('app')
@section('title', '')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$post->title}}</h1>
                <a href="{{$post->url}}" class="btn btn-lg btn-info">Visit</a>
            </div>
            <div class="col-md-3 post-vote-number">
                <h2>{{$post->votes}}</h2>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
        	<div class="col-md-6">
                    {!! Form::open(array('route' => 'vote', 'class' => 'form')) !!}
                    @if (count($vote) > 0)
                        <p>Thanks for your vote!</p>
                    @endif
                    <h4>Interesting.</h4>
                    @if(count($vote) > 0)
                        <div class="progress">
                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ ($vote->vote1 / 5) * 100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($vote->vote1 / 5) * 100}}%">
                            <span class="sr-only">{{ ($vote->vote1 / 5) * 100}}</span>
                          </div>
                        </div>
                    @else
                        <p>Did you find this post interesting?</p>
                        <div id="vote1"></div>
                    @endif
                    <h4>Entertaining.</h4>
                    @if(count($vote) > 0)
                        <div class="progress">
                          <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{ ($vote->vote2 / 5) * 100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($vote->vote2 / 5) * 100}}%">
                            <span class="sr-only">{{ ($vote->vote2 / 5) * 100}}</span>
                          </div>
                        </div>
                    @else
                        <p>Did you find this post entertaining?</p>
                        <div id="vote2"></div>
                    @endif
                    <h4>Engrossing.</h4>
                    
                     @if(count($vote) > 0)
                        <div class="progress">
                          <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="{{ ($vote->vote3 / 5) * 100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($vote->vote3 / 5) * 100}}%">
                            <span class="sr-only">{{ ($vote->vote3 / 5) * 100}}</span>
                          </div>
                        </div>
                    @else
                        <p>Did you find this post engrossing?</p>
                        <div id="vote3"></div>
                    @endif

                    <input type="hidden" name="post_id" value="{{$post->id}}"/>

                    @if (Auth::check() && count($vote) == 0)
                        {!! Form::submit('Vote',
                        array('class'=>'btn btn-primary btn-success btn-vote')) !!}
                        {!! Form::close() !!}
                    @elseif (count($vote) == 0)
                        <a data-toggle="modal" class="btn btn-info btn-success btn-vote" data-target="#loginModal">Login to Vote</a>
                    @endif
        	</div>
        	<div class="col-md-4 col-md-push-2">
        		<h4>More from {{$post->category}}</h4>
                <ul class="list-unstyled">
                    @foreach ($posts as $post)
                        <li><a href="{{$post->query_url}}">{{$post['title']}}</a></li>
                    @endforeach
                </ul>
        	</div>
        </div>
    </div>
@endsection