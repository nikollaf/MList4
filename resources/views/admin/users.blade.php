@extends('app')

@section('content')
    <div class="container">
        <ul class="nav nav-pills admin-pills">
            <li role="navigation" class="label-default"><a href="{{ url('/admin?approve=T') }}">Approve Posts?</a></li>
            <li role="navigation" class="label-success"><a href="{{ url('/admin?approve=Y') }}">See Top Posts</a></li>
            <li role="navigation" class="label-danger"><a href="{{ url('/admin?approve=N') }}">Reject Posts</a></li>
        </ul>
        <div class="row">
            <h3>Admin Categories</h3>
            <div class="col-md-8">
                @foreach ($users as $user)
                    {!! Form::open(array('route' => 'user_update', 'class' => 'form-inline')) !!}
                    <div class="form-group">
                        <input type="text" class="form-control" name="label" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        {!! Form::label('Admin') !!}
                        @if ($user->admin = 'Y')
                            <input type="checkbox" name="admin" value="Y" checked="checked">
                        @else
                            <input type="checkbox" name="admin" value="N">
                        @endif
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    {!! Form::submit('Update',
                    array('class'=>'btn btn-primary btn-success')) !!}
                    {!! Form::close() !!}
                @endforeach

            </div>
        </div>
    </div>
@endsection