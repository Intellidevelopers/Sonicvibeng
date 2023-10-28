@extends('layout.blog-app')
@section('content')
<!-- content    -->
<div class="content">
    <!--section   -->
    <div class="breadcrumbs-header fl-wrap">
        <div class="container">
            <div class="breadcrumbs-header_url">
                <a href="{{route('home')}}">Home</a><span>About</span>
            </div>
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down To Discover</span>
            </div>
        </div>
        <div class="pwh_bg"></div>
    </div>
    <!-- section end  -->
    <!--section   -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-title sect_dec">
                        <h2>Our Story</h2>
                        <h4>Who we are</h4>
                    </div>
                    <div class="about-wrap">
                        <p>
                            {!! $settings->about !!}
                        </p>
                        <a href="https://vimeo.com/225223404" class="btn float-btn color-btn image-popup"> <span>Our
                                Story Video</span> <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="about-img fl-wrap">
                        <img src="{{asset('home_assets/images/all/6.jpg')}}" class="respimg" alt="">
                        <div class="about-img-hotifer color-bg">

                            <p>{{$settings->description}}</p>
                            <h4>@Jossyblog</h4>
                            <h5>Jossy Blog CEO</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" sec-dec">
        </div>
    </section>
    <!--about end   -->
</div>
<!-- content  end-->
@endsection