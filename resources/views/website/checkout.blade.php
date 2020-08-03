@extends('layouts.website')

@section('title', 'checkout information')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Product Checkout</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="checkout.html">Product Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
   <section class="checkout_area section_gap">
      <div class="container">
          <div class="billing_details">
              <div class="row">
                  <div class="col-lg-8">
                      <h3>Billing Details</h3>
                    <form class="row contact_form" action="{{ url('checkout') }}" method="post" novalidate="novalidate">
                        @csrf
                          <div class="col-md-12 form-group p_star">
                              <input type="text" class="form-control"  name="name" placeholder="Full Name" />
                              @error('name')
                                <div class="invalid-feedback">
                                  <strong>{{ $message }}</strong>
                                </div>  
                              @enderror
                          </div>                   
                          <div class="col-md-6 form-group p_star">
                              <input type="text" class="form-control"  name="phone" placeholder="Phone Number" />
                              @error('phone')
                                <div class="invalid-feedback">
                                  <strong>{{ $message }}</strong>
                                </div>  
                              @enderror
                          </div>
                          <div class="col-md-6 form-group p_star">
                              <input type="text" class="form-control" name="email" placeholder="Email Address" />
                          </div>                
                          <div class="col-md-12 form-group p_star">
                              <input type="text" class="form-control" name="address" placeholder="Enter your address" />

                          </div>                   
                          <div class="col-md-12 form-group p_star">
                              <select class="country_select" name="country">
                                  <option value="Country">Country</option>
                                  <option value="Dhaka">Bangladesh</option>
                                  <option value="Pabna">India</option>
                                  <option value="Rajshahi">Pakistan</option>
                                  <option value="Natore">Nepal</option>
                              </select>
                          </div>
                          <div class="col-md-12 form-group p_star">
                              <select class="country_select" name="city">
                                  <option value="City">City</option>
                                  <option value="Dhaka">Dhaka</option>
                                  <option value="Pabna">Pabna</option>
                                  <option value="Rajshahi">Rajshahi</option>
                                  <option value="Natore">Natore</option>
                              </select>
                          </div>
                          <div class="col-md-12 form-group">
                              <input type="text" class="form-control" name="zip" placeholder="Postcode/ZIP" />
                          </div>
                          <div class="col-md-12 form-group">
                            <div class="create_account">
                              <input type="checkbox" name="status">
                              <label>Create an account?</label>
                            </div>
                          </div>
                      </div>
            
                      <div class="col-lg-4">
                          <div class="order_box">
                              <h2>Your Order</h2>
                              <ul class="list">
                                  <li> <a href="#">Product<span>Total</span></a> </li>
                                  @foreach(Cart::content() as $product)
                                  <li><a href="#"> {{ Str::limit($product->name,10) }}<span class="middle">x {{ $product->qty }}</span> 
                                  <span class="last">TK {{ $product->price * $product->qty }}</span> </a>
                                  </li>
                                  @endforeach
                              </ul>
                              <ul class="list list_2">
                                  <li><a href="#">Subtotal <span>TK {{ Cart::subtotal()  }}</span></a> </li>

                                  <li><a href="#"> Shipping <span>Flat rate: TK 50</span></a> </li>

                                  @php
                                    $total = str_replace(',', '', Cart::total());
                                  @endphp

                                  <li> <a href="#">Total<span>TK {{ $total + 50 }}</span></a></li>
                              </ul>
                              <div class="payment_item">
                                  <div class="radion_btn">
                                      <input type="radio" id="f-option5" value="cash" name="payoption" />
                                      <label for="f-option5">Cash on Hand</label>
                                      <div class="check"></div>
                                  </div>  
                              </div>
                              <div class="payment_item active">
                                  <div class="radion_btn">
                                      <input type="radio" id="f-option6" value="bkash" name="payoption" />
                                      <label for="f-option6">Bkash </label>
                                      <img src="{{asset('contents/website')}}/img/product/single-product/card.jpg" alt="" />
                                      <div class="check"></div>
                                  </div>         
                              </div>
                              <div class="creat_account">
                                  <input type="checkbox" id="f-option4" name="selector" />
                                  <label for="f-option4">I’ve read and accept the </label>
                                  <a href="#">terms & conditions*</a>
                              </div>
                               <button class="main_btn">Continue to Payment</button>
                          </div>
                      </div>
                  </div>
              </div>
           </form>
        </div>
     </div>
 </section>

    <!--================End Checkout Area =================-->

@endsection

@push('js')
  
  <script> 

    $(function(){
      
      $('.main_btn').click(function(e){
        e.preventDefault();

        $('.contact_form').submit();

      });
    
    })

  </script>

@endpush