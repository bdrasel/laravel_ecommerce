<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Admin Dashboard')</title>
    <link rel="shortcut icon" href="{{asset('contents/admin')}}/images/favicon.ico">
    <link href="{{asset('contents/admin')}}/plugins/switchery/switchery.min.css" rel="stylesheet">
    @stack('css')
    <link href="{{asset('contents/admin')}}/plugins/slick/slick.css" rel="stylesheet">
    <link href="{{asset('contents/admin')}}/plugins/slick/slick-theme.css" rel="stylesheet">
     <link href="{{asset('contents/admin')}}/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="vertical-layout">    
    
    <div id="containerbar">

        @include('layouts.partials.sidebar')
   
        <div class="rightbar">
            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="index.html" class="mobile-logo"><img src="{{asset('contents/admin')}}/images/logo.svg" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="{{asset('contents/admin')}}/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                            <img src="{{asset('contents/admin')}}/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                         </a>
                                     </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="{{asset('contents/admin')}}/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="{{asset('contents/admin')}}/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                
            @include('layouts.partials.topbar')

          
            @yield('content')

            <!-- Start Footerbar -->
            <div class="footerbar">
                <footer class="footer">
                    <p class="mb-0">© 2019 Orbiter - All Rights Reserved.</p>
                </footer>
            </div>
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="{{asset('contents/admin')}}/js/jquery.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/sweet-alert2/sweetalert2.min.js"></script>


    @if(Session::has('success'))

        <script>
             swal({

                title: 'Successfully!',
                text: '{{session('success')}}',
                type: 'success',
                confirmButtonClass: 'btn btn-success',
                timer:3000
            })
        </script>

    @endif

      @if(Session::has('error'))
        <script>
             swal({

                    title: 'Ops!',
                    text: '{{session('error')}}',
                    type: 'success',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-warning',
                    cancelButtonClass: 'btn btn-danger m-l-10'
                })

        </script>
    @endif

    


    <script src="{{asset('contents/admin')}}/js/popper.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/modernizr.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/detect.js"></script>
    <script src="{{asset('contents/admin')}}/js/jquery.slimscroll.js"></script>
    <script src="{{asset('contents/admin')}}/js/vertical-menu.js"></script>
    <!-- Switchery js -->
    <script src="{{asset('contents/admin')}}/plugins/switchery/switchery.min.js"></script>

    @stack('js')
    <script src="{{asset('contents/admin')}}/plugins/slick/slick.min.js"></script>
    <!-- Custom Dashboard js -->   
    <script src="{{asset('contents/admin')}}/js/custom/custom-dashboard.js"></script>
    <!-- Core js -->
    <script src="{{asset('contents/admin')}}/js/core.js"></script>
    <!-- End js -->
    <script src="{{asset('contents/admin')}}/js/ajax.js"></script>

    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
   </script>
</body>

</html>