        <!doctype html>
        <html lang="en" dir="ltr">

        <head>

            <!-- Meta data -->
            <meta charset="UTF-8">
            <meta http-equiv="x-ua-compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta content="{{$settings->sitename}} " name="description">
            <meta content="{{$settings->description}}" name="author">
            <meta name="keywords" content="admin,">

            <!-- Favicon-->
            <link rel="icon" href="{{asset('upload/'.$settings->favicon)}}" type="image/x-icon" />

            <!-- Title -->
            <title>{{$settings->sitename}}        </title>

            <!-- Bootstrap css -->
            <link href="{{asset('assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css')}}" rel="stylesheet" />

            <!-- Style css -->
            <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

            <!-- Default css -->
            <link href="{{asset('assets/css/default.css')}}" rel="stylesheet">

            <!-- Sidemenu css-->
            <link rel="stylesheet" href="{{asset('assets/plugins/sidemenu/icon-sidemenu.css')}}">

            <!-- Owl-carousel css-->
            <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

            <!-- Bootstrap-daterangepicker css -->
            <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}">

            <!-- Bootstrap-datepicker css -->
            <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css')}}">

            <!-- Custom scroll bar css -->
            <link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

            <!-- P-scroll css -->
            <link href="{{asset('assets/plugins/p-scroll/p-scroll.css')}}" rel="stylesheet" type="text/css">

            <!-- Font-icons css -->
            <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

            <!-- Rightsidebar css -->
            <link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

            <!-- Nice-select css  -->
            <link href="{{asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />

            <!-- Color-palette css-->
            <link rel="stylesheet" href="{{asset('assets/css/skins.css')}}" />
            <!-- Intl-tel-input-master css -->
            <link href="{{asset('assets/plugins/intl-tel-input-master/css/intlTelInput.css')}}" rel="stylesheet">
            <link href="{{asset('assets/plugins/intl-tel-input-master/css/demo.css')}}" rel="stylesheet">


        </head>

        <body class="app sidebar-mini">

            <!-- Loader -->
            <div id="loading">
                <img src="{{asset('assets/images/other/loader.svg')}}" class="loader-img" alt="Loader">
            </div>
            <!-- PAGE -->
            <div class="page">
                <div class="page-main">

                    @yield('content')
                </div>

            </div>

            <!-- Back-to-top -->
            <a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

            <!-- Jquery-scripts -->
            <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>

            <!-- Moment js-->
            <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>

            <!-- Bootstrap-scripts js -->
            <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>

            <!-- Sparkline JS-->
            <script src="{{asset('assets/js/vendors/jquery.sparkline.min.js')}}"></script>

            <!-- Bootstrap-daterangepicker js -->
            <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

            <!-- Bootstrap-datepicker js -->
            <script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>

            <!-- Chart-circle js -->
            <script src="{{asset('assets/js/vendors/circle-progress.min.js')}}"></script>

            <!-- Rating-star js -->
            <script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

            <!-- Clipboard js -->
            <script src="{{asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
            <script src="{{asset('assets/plugins/clipboard/clipboard.js')}}"></script>

            <!-- Prism js -->
            <script src="{{asset('assets/plugins/prism/prism.js')}}"></script>

            <!-- Custom scroll bar js-->
            <script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

            <!-- Nice-select js-->
            <script src="{{asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
            <script src="{{asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

            <!-- Select2 js -->
            <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
            <script src="{{asset('assets/js/select2.js')}}"></script>

            <!-- P-scroll js -->
            <script src="{{asset('assets/plugins/p-scroll/p-scroll.js')}}"></script>
            <script src="{{asset('assets/plugins/p-scroll/p-scroll-1.js')}}"></script>

            <!-- Sidemenu js-->
            <script src="{{asset('assets/plugins/sidemenu/icon-sidemenu.js')}}"></script>

            <!-- JQVMap -->
            <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.js')}}"></script>
            <script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
            <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.sampledata.js')}}"></script>

            <!-- Apexchart js-->
            <script src="{{asset('assets/js/apexcharts.js')}}"></script>

            <!-- Chart js-->
            <script src="{{asset('assets/plugins/chart/chart.min.js')}}"></script>

            <!-- Index js -->
            <script src="{{asset('assets/js/index.js')}}"></script>
            <script src="{{asset('assets/js/index-map.js')}}"></script>

            <!-- Intl-tel-input-master js -->
            <script src="{{asset('assets/plugins/intl-tel-input-master/js/intlTelInput.js')}}"></script>
            <script src="{{asset('assets/plugins/intl-tel-input-master/js/intlTelInput1.js')}}"></script>

            <!-- Rightsidebar js -->
            <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

            <!-- Custom js -->
            <script src="{{asset('assets/js/custom.js')}}"></script>


        </body>

        </html>