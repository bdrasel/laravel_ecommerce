<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Subcategory;
use App\Brand;
use App\Color;
use Cart;

class ProductController extends Controller
{
      public function index()
      {

    	 return view('website.product');
     }

    public function show(Product $product){
    	return view('website.single-product',compact('product'));
    }

    public function productByCategory(Category $category){
   

    	 $products = $category->subcategories()
    	                            ->with('products')->get()
    	                            ->pluck('products')->collapse()->unique('id');

    	return view('website.product',compact('products'));
    }

    public function productBySubcategory(Subcategory $subcategory)
    {
    	 $products = $subcategory->products;
    	return view('website.product',compact('products'));
    }

    public function productByBrand(Brand $brand)
    {
    	
         $products = $brand->products;			
         return view('website.product',compact('products'));
    }


    public function productByColor(Color $color)
    {
    	 $products = $color->products;
    	return view('website.product',compact('products'));
    }

    public function search(Request $request)
    {
         
        $products = Product::where('name', 'Like', "%$request->search%")->orWhere('description', 'Like', "%$request->search%")->paginate(1);
        return view('website.product',compact('products'));
    }
}
