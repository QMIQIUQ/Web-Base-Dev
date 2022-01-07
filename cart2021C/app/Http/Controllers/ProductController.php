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

    public function edit($id){
        $products=Product::all()->where('id',$id);
        return view('editProduct')->with('products',$products)
        ->with('category',Category::all());
    }


    public function update(){
        $r=request();
        $products =Product::find($r->id); 
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $products->image=$imageName;
        }      
        
        $products->categoryID = $r->categoryID;
        $products->name=$r->productName;
        $products->quantity=$r->productQuantity;
        $products->price=$r->productPrice;
        $products->discription=$r->productDiscription;
        $products->save();

        Session::flash('success', "Product update successfully!");
        return redirect()->route('viewProduct');
    }

    public function delete($id){
        $deleteProduct=Product::find($id);
        $deleteProduct->delete();
        Session::flash('success',"Product delete succesfully!");
        return redirect()->route('viewProduct');
    }


    public function productDetail($id){
        $Products=Product::all()->where('id',$id);
        
        return view('productDetail')->with('products',$Products);
    }

    public function show(){
    $products=Product::paginate(5);
    return view('showProduct')->with('products',$products);
    }

    public function searchProduct(){
        $r=request();
        $keyword=$r->keyword;
        $products=DB::table('products')->where('name','like','%'.$keyword.'%')->paginate(5);
        return view('showProduct')->with('products',$products);
    }

    public function phone(){
        $products=DB::table('products')->where('categoryID','=','1')->paginate(5);
        return view('showProduct')->with('products',$products);
    }

    

    
}

       



