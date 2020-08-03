@extends('layouts.admin')

@section('title', $product->name)


@push('css')

    
@endpush


@section('content')

@component('layouts.partials.breadcumb')
     <li class="breadcrumb-item"><a href="{{url('products')}}">Products</a></li>
     <li class="breadcrumb-item active" aria-current="page">Show</li>
@endcomponent

   <div class="contentbar">                
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5">
                            <div class="product-slider-box product-box-for">
                                @foreach($product->images as $image)
                                <div class="product-preview">
                                    <img src="{{asset('storage/products/'.$image->image)}}" class="img-fluid" alt="Product">
                                    <p><span class="badge badge-success font-14">{{$product->discount}}TK off</span></p>
                                </div>
                                @endforeach
                            
                            </div>
                            <div class="product-slider-box product-box-nav">
                                @foreach($product->images as $image)
                                <div class="product-preview">
                                    <img src="{{asset('storage/products/'.$image->image)}}" class="img-fluid" alt="Product">
                                </div>
                               @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <p><span class="badge badge-light font-16">{{$product->brand->name}}</span></p>
                            <h2 class="font-22">{{$product->name}}</h2>
                            <p>
                                <i class="feather icon-star text-warning"></i>
                                <i class="feather icon-star text-warning"></i>
                                <i class="feather icon-star text-warning"></i>
                                <i class="feather icon-star"></i>
                                <i class="feather icon-star"></i>
                                <span class="ml-2">25 Ratings</span>
                            </p>
                            <p class="text-primary font-26 f-w-7 my-3"><sup class="font-16">TK</sup>{{$product->price}}</p>
                            <p class="mb-4">{{$product->description}}</p>
                            <p class="mb-4"><strong>Stock:</strong> {{$product->stock}} {{Str::plural('Item', $product->stock)}}</p>

                            <p>
                               <strong>Subcategories:</strong>
                                @foreach($product->subcategories as $subcategory)
                                <a class="badge badge-info" href="">{{$subcategory->name}}</a>
                                @endforeach
                            </p>

                                <p>
                                     <strong>Colors:</strong>
                                    @foreach($product->colors as $color)
                                    <a class="badge badge-info" href="">{{$color->name}}</a>
                                    @endforeach
                                </p>
                            </ul>                                        
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Product Details</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab-line" data-toggle="tab" href="#description-line" role="tab" aria-controls="description-line" aria-selected="true"><i class="feather icon-file-text mr-2"></i>Description</a>
                        </li>                        
                    </ul>
                    <div class="tab-content" id="defaultTabContentLine">
                        <div class="tab-pane fade show active" id="description-line" role="tabpanel" aria-labelledby="description-tab-line">
                          
                              {!! $product->feature !!}
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>                    
        <!-- End col -->
    </div>
    <!-- End row -->
    <!-- Start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Related Products</h5>
                </div>
                <div class="card-body">
                    <!-- Start row -->
                    <div class="row">                                    
                        @forelse($product->brand->products()->whereNotIn('id',[$product->id]) as $product)
                        
                        <div class="col-lg-6 col-xl-3">
                            <div class="product-bar m-b-30">
                                <div class="product-head">
                                    
                                    <a href="{{url('admin/products/'.$product->slug)}}"><img src="{{asset('storage/products')}}/{{$product->images()->first()->image}}" class="img-fluid" alt="product"></a>
                                    <p><span class="badge badge-success font-14">{{$product->discount}}TK off</span></p>
                                </div>                                            
                                <div class="product-body py-3">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="d-inline-block">
                                                <span class="text-uppercase font-12 f-w-6">{{$product->brand->name}}</span>
                                            </div>
                                            <div class="d-inline-block float-right">
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star"></i>
                                                <i class="feather icon-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h6 class="mt-1 mb-3">{{Str::limit($product->name, 20)}}</h6>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <div class="text-left">
                                                <h5 class="f-w-7 mb-0"><sup class="font-14">TK</sup>{{$product->price}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <button type="button" class="btn btn-primary-rgba font-18"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-6">
                            <p class="alert alert-warning"><b>Product Not Found</b></p>
                        </div>
                        @endforelse
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>	


@endsection

@push('js')

  <script src="{{asset('contents/admin')}}/js/custom/custom-ecommerce-single-product.js"></script>

@endpush
