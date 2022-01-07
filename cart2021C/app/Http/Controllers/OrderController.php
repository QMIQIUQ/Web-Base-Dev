<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\myOrder;
use App\Models\myCart;
use PDF;
use Auth;
use Session;


class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function view(){
        $Order=DB::table('my_orders')
        ->select('my_orders.*')
        ->where('my_orders.userID','=',Auth::id())
        ->get();
        
        return view('myOrders')->with('orders',$Order);
    }

    public function pdfReport()
    {
        $data = DB::table('my_orders')
        ->select('my_orders.*')
        ->where('my_orders.userID','=',Auth::id())
        
        ->get();
        
        $pdf = PDF::loadView('myPDF', compact('data'));
        return $pdf->download('Order_report.pdf');
    }


}
