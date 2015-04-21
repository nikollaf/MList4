@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <a href="/tag/{{$category->label}}"> 
                    <div class="col-md-3 category-section">
                        {{$category->label}}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection