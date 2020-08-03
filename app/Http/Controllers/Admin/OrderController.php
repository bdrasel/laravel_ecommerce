<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderconfirmedMail;
use Illuminate\Support\Facades\Mail;
use App\Order;


class OrderController extends Controller
{

   public function index()
   {
   		$orders = Order::latest()->with('shipping')->paginate(10);
   	   return view('admin.Order.index',compact('orders'));   		
   } 

   public function show(Order $order)
   {
  
   		return view('admin.order.show',compact('order'));
   } 

   public function delivered(Order $order, Request $request)
   {

   		if($request->status == 'completed' && $order->status == 0){
   			$order->status = 1;
   			$order->save();

   			Mail::to($order->shipping->email)->send(new OrderconfirmedMail($order, $request->message));
   		}
   		return back()->with('success','Order successfully delivered');
   }
}
