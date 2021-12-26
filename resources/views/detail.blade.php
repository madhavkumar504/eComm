@extends('master')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="{{$products['gallery']}}" class="h-25" alt="">
        </div>
        <div class="col-md-6">
            <a href="/product">Go Back</a>
            <h1>{{$products['name']}}</h1>
            <h3> {{$products['category']}} </h3>
            <h3>&#x20b9; {{$products['price']}} </h3>
            <p> {{$products['description']}} </p>
            <br><br><br>
            <form action="/add_to_cart" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$products['id']}}">
                <button class="btn btn-warning">Add to Cart</button>
            </form>
            <br><br>
            <button class="btn btn-primary">Buy now</button>
        </div>
    </div>
</div>
@endsection