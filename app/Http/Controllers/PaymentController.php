<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\IpnNotification;
use App\Shipping;
use Cart;
use App\Order;
use App\OrderDetails;

class PaymentController extends Controller
{
    
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function payment(Request $request)
	{
		if(ipn_hash_varify(config('sslcommerz.store_password'))){
		    $ipn = new IpnNotification($_POST);
		    $val_id = $ipn->getValId();
		    $resp = Client::verifyOrder($val_id);
		    $transaction_id = $ipn->getTransactionId();
		    $amount = $ipn->getAmount();

		    
		   $payment = Payment::create([
		    	'trsnsaction_id' => $transaction_id,
		    	'amount' => $amount,
		    	'val_id' => $val_id

		    ]);

		   	 $discount = 0;

	    	  foreach (Cart::content() as $product) {
	    	  	$discount += $product->options->discount * $product->qty;
	    	  }


		    $total = str_replace(',', '', Cart::total() );
    	    $totaldiscount = $total - $discount;
    	    $user = auth()->user();

		    $order = Order::create([
    	  		'shipping_id' => session()->get('shipping_id'),
    	  		'payment_id' => $payment->id,
    	  		'customer_id' => $user->id,
    	  		'order_total' => $totaldiscount,
    	  		'shipping_charge' => session()->get('discount')
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

    	    if($orderConfirm){
				Cart::destroy();
				return redirect('success')->with('success', 'Oder Succdessfull');
			}else{
				return back();
			}
		} 
	}

	public function success(Request $request)
	{
		return view('website.success')->with('success','Payment Successfully');
	}

	public function error(Request $request)
	{
		return view('website.success')->with('error','Opps! please try again');
	}

	public function cancel(Request $request)
	{
		return view('website.success')->with('error','Payment Cancaled');
	}
}
