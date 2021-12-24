<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\myCart;
use Auth;
use Session;

class CartController extends Controller
{
    public function add(){
        $r= request();
        $addItem=myCart::create([
            'quantity'=>$r->quantity,
            'orderID'=>'',
            'productID'=>$r->id,
            'userID'=>Auth::id(),

        ]);
        return redirect()->route('viewCart');
    }

    public function view(){
        $carts=DB::table('my_carts')
        ->leftjoin('products','products.id','=','my_carts.productID')
        ->select('my_carts.quantity as cartQty','my_carts.id as cid','products.*')
        ->where('my_carts.orderID','=','') //the item haven't make payment
        ->where('my_carts.userID','=',Auth::id())
        ->get();
        //select my_carts.quantity as cartQty,my_carts.id as cid, products.* from my_carts left join products on products.id=my_carts.productID where my_cart.orderID='' and my_carts.userID='Auth::id()'    
        Return view('myCart')->with('products',$carts);

    }
}
