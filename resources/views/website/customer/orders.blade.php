@extends('layouts.website')

@section('title', 'customer Infromation')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Orders Dashboard</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="{{ url('/customer') }}">Customer Dashboard</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!-- ================ contact section start ================= -->
  <section class="section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
         @include('website.customer.sidebar')
       </div>
      
      <div class="col-lg-9 col-md-6 col-sm-12 mt-3">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Qty</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($orders as $order)
            <tr>
              <th scope="row">1</th>
              @php
                $product = $order->products->first()
              @endphp
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->qty }}</td>
              <td>
                <a class="btn btn-sm btn-outline-info" href="{{ url('customer/orders/'. $order->id) }}"><i class="fa fa-eye"></i></a>
                
                @php
                  $orderTime = Carbon\Carbon::parse($order->created_at);
                  $currentTime = Carbon\Carbon::parse(now());
                  echo $totalTimeOver = $orderTime->diffInMinutes($currentTime);
                @endphp
                
                @if($totalTimeOver < 30)
                <a class="btn btn-sm btn-outline-danger" href="{{ url('customer/orders/'. $order->id) }}"><i class="fa fa-times"></i></a>
                @endif
              </td>
            </tr>
            @empty
            <tr colspan="4">
              <td class="text-danger text-center">No Order yet!</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
  
    </div>
   </div>
  </section>
    <!-- ================ contact section end ================= -->

@endsection
