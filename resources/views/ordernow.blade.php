@extends('master')
@section('content')
<div class="container mt-3">
  <h2>Hover Rows</h2>         
  <table class="table table-hover">
    <tbody>
      <tr>
        <td>Price</td>
        <td>{{$total}}</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>0 Rupees</td>
      </tr>
      <tr>
        <td>Delivery</td>
        <td>100</td>
      </tr>
      <tr>
        <td>Total Amount</td>
        <td>{{$total + 100}}</td>
      </tr>
    </tbody>
    </table>
    <form action="orderplace" method="post">
        @csrf
        <div class="form-group">
            <textarea class="form-control" placeholder="Enter your address" name="address"></textarea>
        </div>
        <div class="form-group">
            <label class="">Payment Method</label><br>
            <input type="radio" value="cash" name="payment"><span>Online Payment</span><br>
            <input type="radio" value="cash" name="payment"><span>EMI Payment</span><br>
            <input type="radio" value="cash" name="payment"><span>Payment on Delivery</span>
        </div>
        <button type="submit" class="btn btn-primary">Buy Now</button>
    </form>
</div>

@endsection