<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    function getData(){
        $data = Product::all();
        return view('product',['data'=>$data]);
    }
    function details($id){
        $products = Product::find($id);
        return view('detail',['products'=>$products]);
    }
    function search(Request $req){
        $findProduct = Product::where('name','like', '%' .$req->input('query') . '%')
        ->get();
        return view('search',['findProducts'=>$findProduct]);
    }
    function add_to_cart(Request $req){
        if($req->session()->has('user')){
            $cart               =   new Cart;
            $cart->user_id      =   $req->session()->get('user')['id'];
            $cart->product_id   =   $req->product_id;
            $cart->save();
            return redirect('/product');
        }else{
            return redirect('/login');
        }
    }
    public static function cartItem()
    {
        $user_id = Session::get('user')['id'];
        $items = Cart::where('user_id',$user_id)->get();
        return count($items);
    }
    public function cartList(){
        $userId = Session::get('user')['id'];
        $data = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->select('products.*','cart.id as cart_id')
        ->where('cart.user_id',$userId)
        ->get();

        return view('cartlist',['products'=>$data]);
    }
    public function removeCart($id){
        Cart::destroy($id);
        return redirect('/cartlist');
    }
    public function orderNow(){
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');

        return view('ordernow',['total'=>$total]);
    }
    public function orderPlace(Request $req){
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get();

        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address = $req->address;
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->save();
            
        }
        $allCart = Cart::where('user_id',$userId)->delete();
        return redirect('/product');
    }
    public function myOrder(){
        $userId = Session::get('user')['id'];
        $order = DB::table('order')
        ->join('products','order.product_id','products.id')
        ->where('order.user_id',$userId)
        ->get();
        return view('myorder',['orders'=>$order]);
    }
}
