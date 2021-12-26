@extends('master')
@section('content')
<div class="container" >
    <h1>Result for Products</h1>
    <div class=" d-flex">
        @foreach($findProducts as $findProduct)
        <div class="p-4">
            <a href="detail/{id}">
                <img src="{{$findProduct['gallery'] }}" class="" style="height:180px;">
                <div class="">
                    <h5>{{$findProduct['name'] }}</h5>
                    <p> {{$findProduct['description']}} </p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection