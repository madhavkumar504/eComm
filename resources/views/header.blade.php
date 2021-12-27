<?php
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user')){
    $total=ProductController::cartItem();
}
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid p-2">
    <a class="navbar-brand" href="/product">ECOMM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Orders</a>
        </li>
        <form class="d-flex  w-50" action="/search">
          <input class="form-control" type="text" name="query" placeholder="Search">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="/cartlist">Cart Item ({{$total}}) </a>
          </li>
          @if(Session::has('user'))
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> {{Session::get('user')['name']}} </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
          @endif
      </ul>      
    </div>
  </div>
</nav>