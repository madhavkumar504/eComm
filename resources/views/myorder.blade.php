@extends('master')
@section('content')
<div class="container" >
    <h1>My Order List</h1>
    <div class=" d-flex">
        @foreach($orders as $order)
        <div class="p-4">
            <img src="{{$order->gallery }}" class="" style="height:180px;">
            <div class="">
                <h3>{{$order->name }}</h3>
                <h5>Delivery Status: {{$order->status}} </h5>
                <h5>Payment Status: {{$order->payment_status}} </h5>
                <h5>Payment Method: {{$order->payment_method}} </h5>
                <h5>Address: {{$order->address}} </h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection