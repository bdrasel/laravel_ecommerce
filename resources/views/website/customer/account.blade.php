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
         <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
            <div class="card" style="width: 400px;">
            <img height="150px" src="https://www.shivalikjournal.com/site/images/user-avatar-placeholder.png" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">{{ $customer->name }}</h5>
                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                <a href="{{ url('customer/setting') }}" class="btn btn-primary">Edit Profile</a>
              </div>
           </div>
        </div>

    </div>
   </div>
  </section>
    <!-- ================ contact section end ================= -->

@endsection
