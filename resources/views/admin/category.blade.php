@extends('app')

@section('content')
    <div class="container">
        @include('admin.nav')
        <div class="row">
            <h3>Categories</h3>
            <div class="col-md-8">
                @foreach ($categories as $category)
                    {!! Form::open(array('route' => 'category_store', 'class' => 'form-inline')) !!}
                    <div class="form-group">
                        <input type="text" class="form-control" name="label" value="{{$category->label}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Color</label>
                        <input type="color" class="form-control" name="color" value="{{$category->color}}">
                    </div>
                    <input type="hidden" name="id" value="{{$category->id}}">
                    {!! Form::submit('Submit',
                    array('class'=>'btn btn-primary btn-success')) !!}
                    {!! Form::close() !!}
                @endforeach
                <hr>
                <div>
                    {!! Form::open(array('route' => 'category_store', 'class' => 'form-inline')) !!}
                    <div class="form-group">
                        <label for="exampleInputName2">Name</label>
                        <input type="text" class="form-control" name="label">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Color</label>
                        <input type="color" class="form-control" name="color" placeholder="Insert HEX number like #434535">
                    </div>
                    <input type="hidden" name="id" value="0">
                    {!! Form::submit('Submit',
                    array('class'=>'btn btn-primary btn-success')) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
@endsection