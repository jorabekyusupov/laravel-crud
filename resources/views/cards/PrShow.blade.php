@extends('layouts.base')
@section('content')
    <div class="block">
        <div class="card text-white bg-primary">
            <img class="card-img-top" src="{{ asset('public/assets/image/products/'.$product->image) }}" alt="">
            <div class="card-body">
                <h4 class="card-title">{{$product->title}}</h4>
                <p class="card-text">{{$product->about}}</p>
                <span>{{$number = number_format($product->price, '1') }} So'm</span>
                <br>
                <br>

                <span><a href="{{route('products')}}" class="btn btn-light">back to list</a></span>
            </div>
        </div>
    </div>

@endsection
