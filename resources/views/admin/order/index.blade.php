@extends('layouts.admin')

@section('title','Product Dashboard')


@push('css')

    <link href="{{asset('contents/admin')}}/plugins/switchery/switchery.min.css" rel="stylesheet">
    <link href="{{asset('contents/admin')}}/plugins/ion-rangeSlider/ion.rangeSlider.css" rel="stylesheet" type="text/css">

@endpush


@section('content')



@component('layouts.partials.breadcumb')
     <li class="breadcrumb-item"><a href="{{url('products')}}">Products</a></li>
     <li class="breadcrumb-item active" aria-current="page">Index</li>
@endcomponent

  <div class="contentbar">                
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Products</h5>
                        </div>
                        <div class="col-md-6 text-right">
                           <a class="btn btn-danger" href="{{url('admin/products?status=trashed')}}">Trashed</a> 
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phne</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Status</th>                                                
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>{{ $order->shipping->name }}</td>
                                    <td>{{ $order->shipping->phone }}</td>
                                    <td>TK {{ $order->order_total }}</td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                    <td>{!! $order->status() !!} <td>
                                        <div class="button-list">
                                            <a href="page-order-detail.html" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                            <a href="{{ url('admin/orders/'.$order->id) }}" class="btn btn-success-rgba"><i class="feather icon-eye"></i></a>
                                            <a href="page-order-detail.html" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                              @endforeach
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body ecommerce-pagination">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-6">
                            <p>Showing 1 to 2 of 12 entries</p>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            {{ $orders->links() }}
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

  <script src="{{asset('contents/admin')}}/plugins/switchery/switchery.min.js"></script>
  <script src="{{asset('contents/admin')}}/plugins/ion-rangeSlider/ion.rangeSlider.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/custom/custom-ecommerce-shop-page.js"></script>

@endpush