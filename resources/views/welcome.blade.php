@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            @foreach ($posts as $post)
            <div class="js-masonry"
                 data-masonry-options='{ "itemSelector": ".item" }'>
                <div class="item">
                    <h4><a class="click-post" target="_blank" data-token="{{ csrf_token() }}" data-post="{{$post->id}}" href="{{$post->url}}">{{ $post->title}}</a></h4>
                    <h5><a class="see-more" href="/post/{{$post->query_url}}">{{isset($post->votes) ? $post->votes : 'Vote'}} <i class="fa fa-star-o"></i></a></h5>
                </div>
            </div>
            @endforeach

            <div class="col-md-12">
                {!! $posts->render() !!}
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <h4>Categories</h4>
            <div class="tags tags--postTags tags--light">
                @foreach ($categories as $category)
                    <a href="/tag/{{$category->label}}">{{$category->label}}</a>
                @endforeach
            </div>
            <h4>Top Posts in IllMuslims</h4>
            <ul class="list-unstyled top-posts">
            @foreach ($top as $key => $post)
                <li>
                    <span class="badge">{{$key+1}}</span>
                    <div><a href="{{$post->url}}">{{$post->title}}</a></div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection