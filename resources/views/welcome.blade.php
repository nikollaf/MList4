@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="js-masonry"
                 data-masonry-options='{ "columnWidth": 200, "itemSelector": ".item" }'>
                <div class="item">
                    <h4><a href="{{$post->url}}">{{ $post->title}}</a></h4>
                    <h5><a href="/post/{{$post->query_url}}">See More</a></h5>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <h4>Categories</h4>
            <div class="tags tags--postTags tags--light">
                <a href="https://medium.com/tag/ellen-pao">Ellen Pao</a>
                <a href="https://medium.com/tag/women-in-tech">Women in Tech</a>
                <a href="https://medium.com/tag/gender-equality">Gender Equality</a>
                <a href="https://medium.com/tag/indiana">Indiana</a>
                <a href="https://medium.com/tag/periscope">Periscope</a>
                <a href="https://medium.com/tag/meerkat">Meerkat</a>
                <a href="https://medium.com/tag/march-madness">March Madness</a>
                <a href="https://medium.com/tag/facebook">Facebook</a>
                <a href="https://medium.com/tag/design">Design</a>
                <a href="https://medium.com/tag/education">Education</a>
                <a href="https://medium.com/tag/entrepreneurship">Entrepreneurship</a>
                <a href="https://medium.com/tag/fashion">Fashion</a>
                <a href="https://medium.com/tag/medium">Medium</a>
                <a href="https://medium.com/tag/music">Music</a>
                <a href="https://medium.com/tag/travel">Travel</a>
                <a href="https://medium.com/tag/tech">Tech</a>
            </div>
            <h4>Top Posts in IllMuslims</h4>
        </div>
    </div>
</div>
@endsection