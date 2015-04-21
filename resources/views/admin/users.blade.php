@extends('app')

@section('content')
    <div class="container">
        @include('admin.nav')
        <div class="row">
            <h2>Users</h2>
            <div class="col-md-12">
                @foreach ($users as $user)
                    {!! Form::open(array('route' => 'user_update', 'class' => 'form-inline')) !!}
                    <div class="form-group">
                        <!-- <input type="text" class="form-control" name="label" value="{{$user->name}}"> -->
                        {{$user->name}}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Admin') !!}
                        @if ($user->admin == 'Y')
                            <input type="checkbox" name="admin" value="Y" checked="checked">
                        @else
                            <input type="checkbox" name="admin" value="N">
                        @endif
                    </div>
                     <div class="form-group">
                        {!! Form::label('Trust') !!}
                        @if ($user->trust == 'Y')
                            <input type="checkbox" name="trust" value="Y" checked="checked">
                        @else
                            <input type="checkbox" name="trust" value="N">
                        @endif
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    {!! Form::submit('Update',
                    array('class'=>'btn btn-primary btn-success')) !!}
                    {!! Form::close() !!}
                @endforeach

            </div>
            <div class="col-md-12">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
@endsection