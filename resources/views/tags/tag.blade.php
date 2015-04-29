@extends('app')
@section('title', $tag)

@section('content')
    <div class="container tag">
        <div class="row">
            <h1 class="text-capitalize">{{ $tag }}</h1>
            <div class="col-md-8">
                @foreach ($posts as $key => $post)
                <div class="row tag-item collection">
                    <div class="col-md-1 count">
                        {{ $key + 1 }}
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
                <h4>Categories</h4>
                <div class="tags tags--postTags tags--light">
                    @foreach ($categories as $category)
                        <a style="border-color: {{$category->color}}; color: {{$category->color}}" href="/tag/{{$category->label}}">{{$category->label}}</a>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
@endsection