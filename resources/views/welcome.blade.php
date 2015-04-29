@extends('app')
@section('title', 'Latest Posts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5 class="time-ago">{{ date("l, jS F") }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            @foreach ($posts as $post)
            <div class="js-masonry"
                 data-masonry-options='{ "itemSelector": ".item" }'>
                <div class="item card" style="border-color: {{$post->color}}">
                    <h4><a class="click-post" target="_blank" data-token="{{ csrf_token() }}" data-post="{{$post->id}}" href="{{$post->url}}">{{ $post->title}}</a></h4>
                    <h5><a class="see-more" style="color: {{$post->color}}" href="/post/{{$post->query_url}}">{{isset($post->votes) ? $post->votes : 'Vote'}} <i class="fa fa-star-o"></i></a></h5>
                </div>
            </div>
            @endforeach

            <div class="col-md-12">
                {!! $posts->render() !!}
            </div>
        </div>
     
    </div>
</div>
<div class="categories">
        @foreach ($categories as $category)
            <a style="border-color: {{$category->color}}; color: {{$category->color}}" href="/tag/{{$category->label}}">{{$category->label}}</a>
        @endforeach
</div>
@endsection