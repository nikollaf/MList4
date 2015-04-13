@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="js-masonry"
                 data-masonry-options='{ "itemSelector": ".item" }'>
                <div class="item">
                    <h4><a class="click-post" target="_blank" data-token="{{ csrf_token() }}" data-post="{{$post->id}}" href="{{$post->url}}">{{ $post->title}}</a></h4>
                    <h5><a class="see-more" href="/post/{{$post->query_url}}">{{$post->votes}}</a></h5>
                </div>
            </div>
            @endforeach

            <div class="col-md-12">
                {!! $posts->render() !!}
            </div>
        </div>
        <div class="col-md-4">
            <h4>Categories</h4>
            <div class="tags tags--postTags tags--light">
                <a href="/tag/art">Art</a>
                <a href="/tag/women-in-islam">Women in Islam</a>
                <a href="/tag/racial-equality">Racial Equality</a>
                <a href="/tag/america">America</a>
                <a href="/tag/quran">Qur'an</a>
                <a href="/tag/news">News</a>
                <a href="/tag/politcs">Politics</a>
                <a href="/tag/social-network">Social Network</a>
                <a href="/tag/design">Design</a>
                <a href="/tag/education">Education</a>
                <a href="/tag/entrepreneurship">Entrepreneurship</a>
                <a href="/tag/fashion">Fashion</a>
                <a href="/tag/medium">Medium</a>
                <a href="/tag/music">Music</a>
                <a href="/tag/travel">Travel</a>
                <a href="/tag/tech">Tech</a>
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