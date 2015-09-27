@extends('app')
@section('title', $tag)

@section('content')
    <div class="container tag">
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="text-capitalize">{{ $tag }}</h1>
                @foreach ($posts as $key => $post)
                <div class="row tag-item collection">
                    <div class="col-md-2 col-lg-1 count hidden-xs">
                        <span style="background-color: {{$color}}">{{ $tag[0] }}</span>
                    </div>
                    <div class="col-md-9">
                        <h4><a class="click-post" target="_blank" data-token="{{ csrf_token() }}" data-post="{{$post->id}}" href="{{$post->url}}">{{ $post->title}}</a></h4>
                        <p class="time-ago">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="col-md-1 rate">
                        <a href="/post/{{$post->query_url}}">
                            {{ $post->votes }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4">
            

            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
@endsection