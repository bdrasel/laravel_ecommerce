<div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="{{url('admin')}}" class="logo logo-large"><img src="{{asset('contents/admin')}}/images/logo.svg" class="img-fluid" alt="logo"></a>
                    <a href="{{url('admin')}}" class="logo logo-small"><img src="{{asset('contents/admin')}}/images/small_logo.svg" class="img-fluid" alt="logo"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
                        <li>
                            <a href="{{url('admin')}}">
                              <img src="{{asset('contents/admin')}}/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="javacript:void()">
                                <img src="{{asset('contents/admin')}}/images/svg-icon/layouts.svg" class="img-fluid" alt="layouts"><span>Products</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{url('admin/products')}}">All Product</a></li> 
                                <li><a href="{{url('admin/products/create')}}">Create Product</a></li> 
                               
                            </ul>
                        </li> 
                        <li>
                            <a href="{{url('admin/orders')}}">
                              <img src="{{asset('contents/admin')}}/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Order</span>
                            </a>
                        </li>                                     
                    </ul>
                </div>
            </div>
        </div>

