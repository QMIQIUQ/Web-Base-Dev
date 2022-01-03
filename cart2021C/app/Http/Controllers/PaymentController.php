<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use DB;
use Auth;
use App\Models\myOrder;
use App\Models\myCart;
use Session;
use Notification;


class PaymentController extends Controller
{
    

     public function paymentPost(Request $request)
    {
	       
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);

        //create record after paymnet
        $newOrder=myOrder::Create([
            'paymentStatus'=>'Done',
            'userID'=>Auth::id(),
            'amount' => $request->sub,
        ]);

        //get the order ID just now  created
        $orderID=DB::table('my_orders')->where('userID','=',Auth::id())->orderBy('created_at','desc')->first();
        $items=$request->input('cid');
        

        foreach($items as $item=>$value){
            $carts=myCart::find($value);    //get the cart item record
            $carts->orderID=$orderID->id;   //binding the order id with the record
            $carts->save();
        }
        
        $email="dogaang@gmail.com";
        Notification::route('mail',$email)->notify(new \App\Notifications\orderPaid($email));


        return back();
    }

    public function view(){


    }

}

