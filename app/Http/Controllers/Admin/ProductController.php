<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductValidate;
use App\Subcategory;
use App\Category;
use App\Color;
use App\Brand;
use Image;

class ProductController extends Controller
{
   
    public function index()
    {
        if(request('status') == 'trashed'){
            $products = Product::onlyTrashed()->paginate(1);
        }else{
          $products = Product::latest()->paginate(1);
        }
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $subcategories =Subcategory::active()->get();
        $categories =Category::active()->get();
        $colors =Color::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'subcategories', 'colors', 'brands'));
    }


    public function store(ProductValidate $request)
    {
        $request['slug'] = Str::slug($request->name);
        $product = Product::create($request->all());
        
        if($request->hasFile('images')){
            $images = $request->file('images');

            foreach ($images as $image) {
                $imageName = Str::slug($request->name) . '_' . uniqid() . '.' .$image->getClientOriginalExtension();
                if(! Storage::disk('public')->exists('products')){

                    Storage::disk('public')->makeDirectory('products');
                }
                Image::make($image)->fit(555, 600)->save(public_path('storage/products/'. $imageName));

                $product->images()->create( ['image' => $imageName]);
            }
        }

        $product->subcategories()->attach($request->subcategories);
        $product->colors()->attach($request->colors);

        if($product){
            return back()->with('success', $product->name . ' create success');
        }else{
             return back()->with('error', 'Ops! Please try again');
        }
        


    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $subcategories =Subcategory::active()->get();
        $categories =Category::active()->get();
        $colors =Color::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'subcategories', 'colors', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request['slug'] = Str::slug($request->name);
        
        if($request->hasFile('images')){

            foreach($product->images as $productImage){

                 if(! Storage::disk('public')->exists('products/'.$productImage->image)){
                    Storage::disk('public')->delete('products/'.$productImage->image);
                }
            }

            $product->images()->delete();

            $images = $request->file('images');

            foreach ($images as $image) {
                $imageName = Str::slug($request->name) . '_' . uniqid() . '.' .$image->getClientOriginalExtension();
                
                Image::make($image)->fit(555, 600)->save(public_path('storage/products/'. $imageName));

                $product->images()->create( ['image' => $imageName]);
            }
        }

       $update = $product->update($request->all());
        $product->subcategories()->sync($request->subcategories);
        $product->colors()->sync($request->colors);

        if($update){
            return back()->with('success', $product->name . ' update success');
        }else{
             return back()->with('error', 'Ops! Please try again');
        }
    }

    public function destroy(Product $product)
    {
        

        //  foreach($product->images as $productImage){

        //      if(! Storage::disk('public')->exists('products/'.$productImage->image)){
        //         Storage::disk('public')->delete('products/'.$productImage->image);
        //     }
        //  }

        // $product->images()->delete();
        // $product->colors()->detach();
        // $product->subcategories()->detach();

        $delete = $product->delete();

         if($delete){
            return back()->with('success', $product->name . ' delete success');
        }else{
             return back()->with('error', 'Ops! Please try again');
        }

    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $restore = $product->restore();

         if($restore){
            return back()->with('success', $product->name . ' restore success');
        }else{
             return back()->with('error', 'Ops! Please try again');
        }

    }


    public function forecDelete($id)
    {
        
        $product = Product::onlyTrashed()->findOrFail($id);
         foreach($product->images as $productImage){

             if(! Storage::disk('public')->exists('products/'.$productImage->image)){
                Storage::disk('public')->delete('products/'.$productImage->image);
            }
         }

        $product->images()->delete();
        $product->colors()->detach();
        $product->subcategories()->detach();

        $delete = $product->forceDelete();

         if($delete){
            return back()->with('success', $product->name . ' delete success');
        }else{
             return back()->with('error', 'Ops! Please try again');
        }

    }


   public function subcategory($id)
   {

      $subcategories = Subcategory::where('category_id',$id)->get();
      return view('admin.product.subcategory',compact('subcategories'));
   }
}
