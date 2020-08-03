<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use Cart;
use App\Product;
use App\Order;
use App\OrderDetails;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\Customer;

class CheckoutController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

     public function index(){
    	return view('website.checkout');
    }

    public function store(Request $request)
    {
    	 $request->validate([
    	 	'name' => 'required',
    	 	'phone' => 'required'
    	 ],[

    	 	'name.required' => 'Please Enter Your Full Name',
    	 	'phone.required' => 'Enter your Phone Number'

    	 ]);

    	 $request['status'] = (boolean)$request->status;
    	 $shipping =  Shipping::create( $request->all() );

    	  $discount = 0;

    	  foreach (Cart::content() as $product) {
    	  	$discount += $product->options->discount * $product->qty;
    	  }


    	  $total = str_replace(',', '', Cart::total() );
    	  $totaldiscount = $total - $discount;
    	  $user = auth()->user();

    	  if($request->payoption == 'cash'){
    	  	$order = Order::create([
    	  		'shipping_id' => $shipping->id,
    	  		'customer_id' => $user->id,
    	  		'order_total' => $totaldiscount,
    	  		'shipping_charge' => 50,
    	  	]);

    	  	foreach (Cart::content() as $product) {
	    	  	OrderDetails::create([
	    	  		'order_id' => $order->id,
	    	  		'product_id' => $product->id,
	    	  		'product_name' => $product->name,
	    	  		'price' => $product->price,
	    	  		'qty' => $product->qty,
	    	  		'discount' => $product->options->discount,
	    	  	]);

	    	  	$orderdProduct = Product::findOrFail($product->id);
	  	        $orderdProduct->stock = $orderdProduct->stock - $product->qty;
	            $orderConfirm = $orderdProduct->save();
    	   }
    	  
     }else{

     
     	$customer = new Customer($user->name, $user->email, $shipping->phone );
		$resp = Client::initSession($customer, $totaldiscount); 
		session()->put('shipping_id',$shipping);
        session()->put('discount',$request->discount);
		return redirect($resp->getGatewayUrl());

     }

     if($orderConfirm){

		Cart::destroy();
		return redirect('success')->with('success', 'Oder Succdessfull');

	}else{
		return back();
	}

  }

  
}
