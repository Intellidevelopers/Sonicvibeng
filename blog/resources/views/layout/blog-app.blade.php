<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>{{$settings->sitename}}</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <script src="{{asset('home_assets/js/jquery.min.js')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('home_assets/css/plugins.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('home_assets/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('home_assets/css/color.css')}}">
    <!--=============== favicons ===============-->

    <link rel="shortcut icon" href="{{asset('upload/'.$settings->favicon)}}">


</head>

<body>

    @include('layout.blog-header')
    @php
    use Illuminate\Support\Str;
    @endphp
    @yield('content')
    @include('layout.blog-footer')
    <!-- Main end -->
    <!-- <div class="cookie-info-bar">
        <div class="container">
            <div class="cookie-info-bar_title"><i class="fal fa-cookie"></i>Our site uses cookies. Learn more about
                our use of cookies: <a href="terms.html">Cookie policy</a></div>
            <a href="#" class="sicb_btn color-bg">Accept</a>
            <a href="#" class="sicb_btn">Reject</a>
        </div>
    </div> -->
    <!-- cookie-info-bar end -->
    </div>
    <!--=============== scripts  ===============-->

    <script src="{{asset('home_assets/js/plugins.js')}}"></script>
    <script src="{{asset('home_assets/js/scripts.js')}}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/64c7afe4cc26a871b02c5860/1h6m0e69t';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>