<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class CustomerController extends Controller
{
     public function index()
    {
    	
    	$totalOrder = Order::count();
    	$activeOrder = Order::where('status',1)->count();
    	$totalcancleOrder = Order::where('status',0)->count();
        return view('website.customer.dashboard',compact('totalOrder','activeOrder','totalcancleOrder'));
    }

    public function orders()
    {
    	$orders = auth()->user()->orders;
    	 return view('website.customer.orders',compact('orders'));
    }

    public function show(Order $order)
    {
    	$products = $order->products; 
    	return view('website.customer.show',compact('products', 'order'));
    }

    public function setting()
    {
    	$customer = auth()->user();
    	return view('website.customer.setting',compact('customer'));
    }

    public function profile()
    {
    	$customer = auth()->user();
    	return view('website.customer.account',compact('customer'));
    }

    public function profileUpdate(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string|max:255',
    		'email' => 'required|email|max:255',
    		'password' => 'nullable|min:8|confirmed'
    	]);

    	$request['password'] = bcrypt($request->password);

    	$update = auth()->user()->update($request->all());

    	if($update){
    		return back()->with('success','Profile Successfully Updated');
    	}
    }

    public function logout()
    {
    	auth()->logout();
    	return back();
    }
}
