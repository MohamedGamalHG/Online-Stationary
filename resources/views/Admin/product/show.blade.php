@extends('Admin.main')

@section('content')
    <div class="container">
        <h2 class="text-center mb-5">Product Name is : {{$product->name}} with all Images</h2>

        <div class="row">
            @foreach($product->images as $image)
            <div class="col mb-3">
                <img src="{{asset('images/'.$product->id.'/'.$image->name)}}" width="300px" height="300px" alt="...">
            </div>
            @endforeach
        </div>

    </div>
@endsection

@section('js')

@endsection
