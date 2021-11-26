<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function add(){
        $r=request();
        $addProduct=Product::create([
            'categoryID'=>$r->categoryID,
            'name'=>$r->productName,
            'image'=>$r->productImage,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'discription'=>$r->productDiscription,
        ]);


        return view('addProduct') ->with('categoryID',Category::all());
    }

    public function show(){
        $products=Product::paginate(5);
        return view('showProduct')->with('products',$products);
    }
}

