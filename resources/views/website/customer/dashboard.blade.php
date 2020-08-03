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
              <h2>Customer Dashboard</h2>
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

       <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><i class="fa fa-shopping-bag"></i> {{ $totalOrder }}</h5>
              <p class="card-text">Total Order</p>
              <p>Lorem ipsum dolor sit amet, consectetur...</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
         </div>
       </div>

       <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><i class="fa fa-shopping-cart"></i> {{ $activeOrder }} </h5>
              <p class="card-text">Active Order </p>
              <p>Lorem ipsum dolor sit amet, consectetur...</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
         </div>
       </div>

       <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><i class="fa fa-times"></i> {{ $totalcancleOrder }}</h5>
              <p class="card-text">Canceled Order</p>
              <p>Lorem ipsum dolor sit amet, consectetur...</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
         </div>
       </div>
    </div>
   </div>
  </section>
    <!-- ================ contact section end ================= -->

@endsection
