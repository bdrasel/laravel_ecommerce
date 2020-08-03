<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
    	$request['product_id'] = $product->id;
    	$request['user_id'] = auth()->id();
    	Review::create($reuest->all());
    	return response()->json($request->all());
    }
}
