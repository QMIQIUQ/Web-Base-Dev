<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;


class CategoryController extends Controller
{
    public function add(){
        $r=request();
        $addCategory=Category::create([
            'name'=>$r->productName,
            'image'=>$r->productImage,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'discription'=>$r->productDiscription,
        ]);
        return view('addCategory');
    }
}
