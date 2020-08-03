@extends('layouts.admin')
@section('title','create product')

@push('css')

    <link href="{{asset('contents/admin')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
    <link href="{{asset('contents/admin')}}/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">

      <link href="{{asset('contents/admin')}}/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css">

@endpush

@section('content')

 @component('layouts.partials.breadcumb')
            
    <li class="breadcrumb-item"><a href="{{url('products')}}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
 @endcomponent

 <div class="contentbar">   
   <form action="{{url('admin/products')}}" method="post" enctype="multipart/form-data" id="productCreate"> 
    @csrf  
    <div class="row">
        <div class="col-lg-8 col-xl-9">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Product Create</h5>
                </div>
                <div class="card-body">
                   
                        
                        <div class="form-group row">
                            <label for="productTitle" class="col-sm-12 col-form-label">Product Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control font-20" name="name" placeholder="Name" value="{{old('name')}}">
                               @error('name') 
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                                     
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Feature</label>
                            <div class="col-sm-12">
                                <textarea name="feature" value="{{old('feature')}}" class="summernote">{{old('feature')}}</textarea>
                                 @error('feature') 
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                  @enderror
                            </div>
                            
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-product-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Price($)</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="price" class="form-control" value="{{old('price')}}"  placeholder="100">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Discount($)</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="{{old('discount')}}"  name="discount" class="form-control" placeholder="50">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Stock</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="{{old('stock')}}"  name="stock" class="form-control" placeholder="100">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="weight" class="col-sm-12 col-form-label">Product Description</label>
                                            <div class="col-sm-12">
                                              <textarea class="form-control" value="{{old('description')}}"  name="description" cols="76" rows="6"></textarea>
                                            </div>
                                       </div> 
                                       <div class="form-group row mt-2">
                                            <button type="submit" class="btn btn-primary btn-block">Create Product</button>
                                       </div>                                    
                                   </div>
                                </div>  
                            </div>
                         </div>
                    </div>

            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-4 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Categories</h5>
                </div>
                <div class="card-body">
                  <select name="state" class="select2-single form-control" name="category" id="category">
                     <option>Select Category</option> 
                     @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option> 
                      @endforeach     
                 </select>
                    <br>
        
                   <select class="select2-multi-select form-control" id="subcategories" name="subcategories[]" multiple="multiple">
                       <option>Select Subcategory</option> 
                        @foreach($subcategories as $subcategory)
                           <option value="{{$subcategory->id}}">{{$subcategory->name}}</option> 
                         @endforeach 
                    </select>  
                </div>
            </div>

      
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Color</h5>
                </div>
                <div class="card-body pt-3">                      
                    <select class="select2-multi-select form-control" name="colors[]" multiple="multiple">
                        @foreach($colors as $color)
                        <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </select>                                          
                   
                </div>
            </div>

            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Brand</h5>
                </div>
                <div class="card-body">
                    <div class="product-tags">
                        <select name="brand_id" class="select2-single form-control">
                           <option>Select Brand</option> 
                           @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach      
                        </select>
                    </div>                                
                </div>
               
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Product Image</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="images[]" class="form-control" multiple>    
                    </div>
                    <div class="form-group">
                        <label>New From</label><br>                                
                        <input type="text" id="default-date" value="{{old('form')}}" name="new_from" class="datepicker-here form-control" />      
                    </div>

                     <div class="form-group">
                        <label>New To</label>  <br>                                
                        <input type="text" id="default-date-to"  value="{{old('to')}}" name="new_to" class="datepicker-here form-control" />    
                     </div>
                </div>
            </div>
         </div>
     </div>
 </form>
</div>
 
@endsection

@push('js')

    <script src="{{asset('contents/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/dropzone/dist/dropzone.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom/custom-ecommerce-product-detail-page.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom/custom-form-select.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/select2/select2.min.js"></script> 


    <script src="{{asset('contents/admin')}}/plugins/datepicker/datepicker.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/datepicker/i18n/datepicker.en.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom/custom-form-datepicker.js"></script>

@endpush
