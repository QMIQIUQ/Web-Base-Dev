<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use Session;

class ProductController extends Controller
{
    public function add(){
        $r=request();
        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        
        $addProduct=Product::create([
            'categoryID'=>$r->categoryID,
            'name'=>$r->productName,
            'image'=>$imageName,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'discription'=>$r->productDiscription,
        ]);

        Session::flash('success', "Product create successfully!");
        return redirect()->route('viewProduct');
    }

    public function view(){
        //$viewProducts=Product::all();
        $viewProducts=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->select('products.*','categories.name as catName')
        ->get();
        
        return view('viewProduct')->with('products',$viewProducts);
    }


}

