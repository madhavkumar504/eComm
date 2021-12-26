@extends('master')
@section('content')

<!-- Carousel -->
<div class="custome-product">
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
  @foreach($data as $list)
    <div class="carousel-item {{$list['id']==1?'active':''}}">
      <a href="details/{{$list['id']}}">
        <img src="{{$list['gallery'] }}" class=" w-100" style="height:500px;">
        <div class="carousel-caption ">
            <h5>{{$list['name'] }}</h5>
            <p>{{$list['description'] }}</p>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
<!-- trending products -->
    <div class="tranding-products">
        <h1>Trending Products</h1>
        <div class="">
            @foreach($data as $list)
            <div class="trending-item">
                <a href="details/{{$list['id']}}">
                    <img src="{{$list['gallery'] }}" class="" style="height:180px;">
                    <div class="">
                        <h5>{{$list['name'] }}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection