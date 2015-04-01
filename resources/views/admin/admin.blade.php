@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="row">
                        <div class="col-md-2">
                            <span class="glyphicon glyphicon-edit"></span>
                        </div>
                        <div class="col-md-6">
                            <h4><a href="{{$post->url}}">{{ $post->title}}</a></h4>
                        </div>
                    </div>
                    <div class="collapse">
                        {!! Form::open(array('route' => 'admin_store', 'class' => 'form')) !!}
                        <h5>Title</h5>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}"/>
                        <h5>Url</h5>
                        <input type="text" class="form-control" name="url" value="{{$post->url}}"/>
                        <h5>Category</h5>
                        <select></select>
                        <h5>Approve It?</h5>
                        Yes <input type="radio" class="form-control" name="approval" value="Y"/>
                        No <input type="radio" class="form-control" name="approval" value="F"/>

                        <input type="hidden" name="id" value="{{$post->id}}"/>
                        {!! Form::submit('Post!',
                        array('class'=>'btn btn-primary')) !!}
                        {!! Form::close() !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection