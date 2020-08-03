<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
     public function index(){
     	//Cart::destroy();
     	$products = Cart::content();
    	return view('website.cart',compact('products'));
    }

    // public function addToCart(Product $product)
    // {

    // 	$added = Cart::add([

    // 		'id' => $product->id,
    // 		'name' => $product->name,
    // 		'qty' => 1,
    // 	    'price' => $product->price,
    // 	    'weight' => 0,
    		

    // 		]);

	   //  	if($added){
	   //          return back()->with('success', $product->name . ' successfully add to cart');
	   //      }else{
	   //           return back()->with('error', 'Ops! Please try again');
	   //      }

    // }

    public function cartAdd(Product $product, Request $request)
    {
    	    //Cart::destroy();
    	    $added = Cart::add([

    		'id' => $product->id,
    		'name' => $product->name,
    		'qty' => $request->qty ?: 1 ,
    	    'price' => $product->price,
    	    'weight' => 0,
    	    'options' => ['color' => $request->color ?: NULL , 'image' => $product->images()->first()->image, 'discount' => $product->discount]
    		

    		]);

	    	if($added){
	            return response()->json(['success' => $product->name . ' successfully add to cart']);
	        }else{
	             return response()->json(['error' => 'Ops! Please try again']);
	        }
    }

    public function cartItems()
    {
    	return view('website.cartItems');
    }

    public function cartUpdate(Request $request)
    {
    	$qty = $request->qty;
    	$rowId = $request->rowid;
    	$update = Cart::update($rowId, $qty);

    	if($update){
	            return response()->json(['success' =>  'Cart Successfully Updated']);
	        }else{
	             return response()->json(['error' => 'Ops! Please try again']);
	        }
    }

    public function cartpage()
    {
    	
    	return view('website.cartpage');
    }

    public function remove($rowid)
    {
    	 Cart::remove($rowid);
	      return response()->json(['success' =>  'Cart Remove Success']);  
    }
}
