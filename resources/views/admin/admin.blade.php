@extends('app')

@section('content')
    <div class="container">
        <ul class="nav nav-pills admin-pills">
            <li role="navigation" class="label-default"><a href="{{ url('/admin?approve=T') }}">Approve Posts?</a></li>
            <li role="navigation" class="label-success"><a href="{{ url('/admin?approve=Y') }}">See Top Posts</a></li>
            <li role="navigation" class="label-danger"><a href="{{ url('/admin?approve=N') }}">Reject Posts</a></li>
        </ul>
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="row">
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#{{$post->query_url}}" aria-expanded="false" aria-controls="collapseExample">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <h4><a href="{{$post->url}}">{{ $post->title}}</a></h4>
                        </div>
                    </div>
                    <div class="collapse collapse-form" id="{{$post->query_url}}">
                        {!! Form::open(array('route' => 'admin_store', 'class' => 'form')) !!}
                        <h5>Title</h5>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}"/>
                        <h5>Url</h5>
                        <input type="text" class="form-control" name="url" value="{{$post->url}}"/>
                        <h5>Category</h5>
                        <select name="category">

                        </select>

                        <h5>Approve It?</h5>
                        <div class="row">
                            <div class="col-md-6">
                                Yes <input type="radio" class="form-control" name="approval" value="Y"/>
                            </div>
                            <div class="col-md-6">
                                No <input type="radio" class="form-control" name="approval" value="N"/>
                            </div>
                        </div>



                        <input type="hidden" name="id" value="{{$post->id}}"/>
                        {!! Form::submit('Submit',
                        array('class'=>'btn btn-primary btn-success')) !!}
                        {!! Form::close() !!}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            {!! $posts->render() !!}
        </div>
    </div>
@endsection