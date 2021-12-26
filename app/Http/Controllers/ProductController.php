<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

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
        $user_id = session()->get('user')['id'];
        $items = Cart::where('user_id',$user_id)->get();
        return count($items);

    }
}
