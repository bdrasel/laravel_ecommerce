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
        <div class="col-lg-8 col-md-6 col-sm-12 mt-3">
          <h2 class="contact-title">Update Profile</h2>
          <form class="form-contact contact_form" action="{{ url('customer/profile/update') }}" method="post" novalidate="novalidate">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" type="text" value="{{ $customer->name }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" type="email" value="{{ $customer->email }}">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                </div>
              </div>
            </div>
            <div class="form-group mt-lg-3">
              <button type="submit" class="main_btn">Update Profile</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
    <!-- ================ contact section end ================= -->

@endsection
