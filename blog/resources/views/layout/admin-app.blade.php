        <!doctype html>
        <html lang="en" dir="ltr">

        <head>

            <!-- Meta data -->
            <meta charset="UTF-8">
            <meta http-equiv="x-ua-compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta content="{{$settings->description}}" name="description">
            <meta content="Spruko Technologies Private Limited" name="author">
            <meta name="keywords" content="{{$settings->description}}">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- Favicon-->
            <link rel="icon" href="{{asset('upload/'.$settings->favicon)}}" type="image/x-icon" />

            <!-- Title -->
            <title>{{$settings->sitename}} </title>
            <!-- Jquery-scripts -->
            <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>

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

            <!-- Sweet-alert css -->
            <link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />

            <!-- Rightsidebar css -->
            <link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

            <!-- Nice-select css  -->
            <link href="{{asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />

            <link rel="stylesheet" href="{{asset('assets/css/skins.css')}}" />
            <!-- Notifications css -->
            <link href="{{asset('assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet" />

            <!-- Wizard editor css -->
            <link href="{{asset('assets/plugins/jquery.richtext/jquery.richtext.css')}}" rel="stylesheet" />

            <!-- Summernote css -->
            <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}">

            <!-- foem wizard css -->
            <link rel="stylesheet" href="{{asset('assets/plugins/formwizard/smart_wizard.css')}}">
            <link rel="stylesheet" href="{{asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css')}}">
            <link rel="stylesheet" href="{{asset('assets/plugins/formwizard/smart_wizard_theme_circles.css')}}">
            <link rel="stylesheet" href="{{asset('assets/plugins/formwizard/smart_wizard_theme_dots.css')}}">

            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            <script>
            $(document).ready(function() {
                @if(Session::has('msg'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('msg') }}");
                @endif @if(Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('error') }}");
                @endif @if(Session::has('info')) toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.info("{{ session('info') }}");
                @endif @if(Session::has('warning')) toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.warning("{{ session('warning') }}");
                @endif
            });
            </script>




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
                
                <!-- Footer opened -->
                <footer class="footer-main icon-footer">
                    <div class="container">
                        <div class="  mt-2 mb-2 text-center">
                            {{$settings->copyright}}
                        </div>
                    </div>
                </footer>
                <!-- Footer closed -->
            </div>

            <!-- Back-to-top -->
            <a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>



            <!-- Moment js-->
            <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
            <script src="{{asset('assets/js/myjavascript.js')}}"></script>
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
            <!-- Sweet-alert js  -->
            <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
            <script src="{{asset('assets/js/sweet-alert.js')}}"></script>

            <!-- Wizard editor js  -->
            <script src="{{asset('assets/plugins/jquery.richtext/jquery.richtext.js')}}"></script>

            <!-- Summernote js  -->
            <script src="{{asset('assets/plugins/summernote/summernote-bs4.js')}}"></script>

            <!-- Form editor js -->
            <script src="{{asset('assets/js/summernote.js')}}"></script>
            <script src="{{asset('assets/js/formeditor.js')}}"></script>

            <!-- Notifications js -->
            <script src="{{asset('assets/plugins/notify/js/rainbow.js')}}"></script>
            <script src="{{asset('assets/plugins/notify/js/sample.js')}}"></script>
            <script src="{{asset('assets/plugins/notify/js/jquery.growl.js')}}"></script>

        </body>

        </html>