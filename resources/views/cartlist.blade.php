@extends('master')
@section('content')
<div class="container" >
    <h1>Cart List</h1>
    <a href="/ordernow" class="btn btn-success">Order Now</a>
    <div class=" d-flex">
        @foreach($products as $product)
        <div class="p-4">
            <a href="detail/{id}">
                <img src="{{$product->gallery }}" class="" style="height:180px;">
                <div class="">
                    <h5>{{$product->name }}</h5>
                    <p> {{$product->description}} </p>
                    <a href="/removecart/{{$product->cart_id}}" class="btn btn-danger">Remove from Cart</a>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection