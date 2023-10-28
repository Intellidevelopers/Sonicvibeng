        <!doctype html>
        <html lang="en" dir="ltr">

        <head>

            <!-- Meta data -->
            <meta charset="UTF-8">
            <meta http-equiv="x-ua-compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta
                content="Dashlot - Bootstrap Responsive Admin panel Dashboard Template Ui Kit & Premium Dashboard Design Modern Flat HTML Template. This Template Includes 100 HTML Pages & 40+ Plugins. No Need to do hard work for this template customization."
                name="description">
            <meta content="Spruko Technologies Private Limited" name="author">
            <meta name="keywords"
                content="admin,dashboard,dashboard template,bootstrap dashboard template,bootstrap admin template,admin panel template,admin dashboard template,admin template,admin dashboard,bootstrap 4 admin template,bootstrap dashboard,bootstrap simple dashboard,bootstrap 4 dashboard template,modern admin,bootstrap admin panel,best admin templates,bootstrap admin dashboard template,simple admin panel template,html admin template,simple bootstrap admin template,bootstrap admin dashboard,adminlte template,html dashboard template,responsive admin template,admin dashboard bootstrap 4,admin panel design,bootstrap admin,web dashboard,user dashboard,bootstrap 4 dashboard,bootstrap admin panel template,simple dashboard html template">

            <!-- Favicon-->
            <link rel="icon" href="../assets/images/brand/favicon.png" type="image/x-icon" />

            <!-- Title -->
            <title>Jossyblog </title>

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

        </head>

        <body class="app sidebar-mini">

            <!-- Loader -->
            <div id="loading">
                <img src="{{asset('assets/images/other/loader.svg')}}" class="loader-img" alt="Loader">
            </div>
            <!-- PAGE -->
            <div class="page">
                <div class="page-main">

                    @include('layout/header')
                    @include('layout.sidebar')
                    @yield('content')
                </div>
                @include('layout.right-sidebar')
                <!-- Footer opened -->
                <footer class="footer-main icon-footer">
                    <div class="container">
                        <div class="  mt-2 mb-2 text-center">
                            Copyright © 2019 <a href="#" class="fs-14 text-primary">Dashlot</a>. Designed by <a
                                href="https://spruko.com/" class="fs-14 text-primary">Spruko Technologies Private
                                Limited</a>
                            All rights reserved.
                        </div>
                    </div>
                </footer>
                <!-- Footer closed -->
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

            <!-- Rightsidebar js -->
            <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

            <!-- Custom js -->
            <script src="{{asset('assets/js/custom.js')}}"></script>

        </body>

        </html>