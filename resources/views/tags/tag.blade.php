@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)

                        <div class="item">
                            <h4><a class="click-post" target="_blank" data-token="{{ csrf_token() }}" data-post="{{$post->id}}" href="{{$post->url}}">{{ $post->title}}</a></h4>

                        </div>

                @endforeach

                <div class="col-md-12">
                    {!! $posts->render() !!}
                </div>
            </div>
            <div class="col-md-4">
                <h4>Categories</h4>
                <div class="tags tags--postTags tags--light">
                    <a href=""/tag/ellen-pao">Ellen Pao</a>
                    <a href="/tag/women-in-tech">Women in Tech</a>
                    <a href="/tag/gender-equality">Gender Equality</a>
                    <a href="/tag/indiana">Indiana</a>
                    <a href="/tag/periscope">Periscope</a>
                    <a href="/tag/meerkat">Meerkat</a>
                    <a href="/tag/march-madness">March Madness</a>
                    <a href="/tag/facebook">Facebook</a>
                    <a href="/tag/design">Design</a>
                    <a href="/tag/education">Education</a>
                    <a href="/tag/entrepreneurship">Entrepreneurship</a>
                    <a href="/tag/fashion">Fashion</a>
                    <a href="/tag/medium">Medium</a>
                    <a href="/tag/music">Music</a>
                    <a href="/tag/travel">Travel</a>
                    <a href="/tag/tech">Tech</a>
                </div>

            </div>
        </div>
    </div>
@endsection