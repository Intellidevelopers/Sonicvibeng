@extends('layout.blog-app')
@section('content')

<!-- content    -->
<div class="content">
    <!-- hero-slider-wrap     -->
    <div class="hero-slider-wrap fl-wrap">
        <!-- hero-slider-container     -->
        <div class="hero-slider-container multi-slider fl-wrap full-height">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- swiper-slide -->
                    @if(!empty($slidepost))
                    @foreach($slidepost as $post)
                    <div class="swiper-slide">
                        <div class="bg-wrap">
                            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}" data-swiper-parallax="40%">
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <div class="hero-item fl-wrap">
                            <div class="container">
                                <a class="post-category-marker" href="{{url('home/'.$post->category->slug)}}">{{$post->category->name}}</a>
                                <div class="clearfix"></div>
                                <h2><a href="{{route('post',$post->slug)}}">{{$post->name}}</a></h2>
                                <h4>{!! Str::limit($post->body, 150, '...') !!}. </h4>
                                <div class="clearfix"></div>
                                <div class="author-link"><a href="{{route('author',$post->admin->id)}}"><img src="{{asset('upload/'.$post->admin->profile)}}" alt="">
                                        <span>By
                                            Jossy
                                            Blog</span></a>
                                </div>
                                <span class="post-date"><i class="far fa-clock"></i> {{$post->created_at}}</span>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif
                </div>
            </div>
            <div class="fs-slider_btn color-bg fs-slider-button-prev"><i class="fas fa-caret-left"></i>
            </div>
            <div class="fs-slider_btn color-bg fs-slider-button-next"><i class="fas fa-caret-right"></i>
            </div>
        </div>
        <!-- hero-slider-container  end   -->
        <!-- hero-slider_controls-wrap   -->
        <div class="hero-slider_controls-wrap">
            <div class="container">
                <div class="hero-slider_controls-list multi-slider_control">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!-- swiper-slide  -->
                            @if(!empty($slidepost))
                            @foreach($slidepost as $post)
                            <div class="swiper-slide">
                                <div class="hsc-list_item fl-wrap">
                                    <div class="hsc-list_item-media">
                                        <div class="bg-wrap">
                                            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}"></div>
                                        </div>
                                    </div>
                                    <div class="hsc-list_item-content fl-wrap">
                                        <h4>{{$post->name}}</h4>
                                        <span class="post-date"><i class="far fa-clock"></i>
                                            {{$post->created_at}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <!-- swiper-slide end   -->

                        </div>
                    </div>
                </div>
                <div class="multi-pag"></div>
            </div>
        </div>
        <!-- hero-slider_controls-wrap end  -->
        <div class="slider-progress-bar act-slider">
            <span>
                <svg class="circ" width="30" height="30">
                    <circle class="circ2" cx="15" cy="15" r="13" stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none" />
                    <circle class="circ1" cx="15" cy="15" r="13" stroke="#e93314" stroke-width="2" fill="none" />
                </svg>
            </span>
        </div>
    </div>
    <!-- hero-slider-wrap  end   -->
    <!-- section   -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-container fl-wrap fix-container-init">
                        <div class="section-title">
                            <h2>Lastest World News</h2>
                            <h4>Don't miss daily news</h4>
                            <div class="ajax-nav">
                                <ul>
                                    <li><a href="{{route('home')}}" class="current_page">Home</a></li>
                                    @if(!empty($category))
                                    @foreach($category as $cat)
                                    <li><a href="{{url('home/'.$cat->slug)}}">{{$cat->name}}</a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="grid-post-wrap">
                            <div class="more-post-wrap  fl-wrap">
                                <div class="list-post-wrap list-post-wrap_column fl-wrap">
                                    <div class="row">
                                        <!--list-post-->
                                        @if(!empty($lastest_post))
                                        @foreach($lastest_post as $post)
                                        <div class="col-md-6">
                                            <div class="list-post fl-wrap">
                                                <a class="post-category-marker" href="#">{{$post->category->name}}</a>
                                                <div class="list-post-media">
                                                    <a href="{{route('post',$post->slug)}}">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <span class="post-media_title">&copy;
                                                        {{$post->name}}</span>
                                                </div>
                                                <div class="list-post-content">
                                                    <h3><a href="{{route('post',$post->slug)}}">
                                                            {{ Str::limit(strip_tags($post->body), 150, '...') }} </a>
                                                    </h3>
                                                    <span class="post-date"><i class="far fa-clock"></i>
                                                        {{$post->created_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif

                                        <!--list-post end-->


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Advertisement -->
                        <div class="content-banner-wrap cbw_mar">
                            @if(!empty($body_adverts))
                            @foreach($body_adverts as $post)
                            <img src="{{asset('upload/'.$post->banner)}}" class="respimg" alt="" style="height: 200px;">
                            @endforeach
                            @endif
                        </div>


                        <div class="clearfix"></div>
                        <div class="section-title sect_dec">
                            <h2>Top Stories</h2>
                            <h4>Don't miss daily news</h4>
                        </div>
                        <div class="grid-post-wrap">
                            <div class="more-post-wrap  fl-wrap">
                                <div class="list-post-wrap list-post-wrap_column fl-wrap">
                                    <div class="row">
                                        <!--list-post-->
                                        @if(!empty($top_post))
                                        @foreach($top_post as $post)
                                        <div class="col-md-6">
                                            <div class="list-post fl-wrap">
                                                <a class="post-category-marker" href="#">{{$post->category->name}}</a>
                                                <div class="list-post-media">
                                                    <a href="{{route('post',$post->slug)}}">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <span class="post-media_title">&copy;
                                                        {{$post->name}}</span>
                                                </div>
                                                <div class="list-post-content">
                                                    <h3><a href="{{route('post',$post->slug)}}">{{ Str::limit(strip_tags($post->body), 150, '...') }} </a>
                                                    </h3>
                                                    <span class="post-date"><i class="far fa-clock"></i>
                                                        {{$post->created_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif

                                        <!--list-post end-->


                                    </div>
                                </div>
                            </div>
                            <!--grid-post-item-->
                            <div class="single-grid-slider-wrap fl-wrap">
                                <div class="single-grid-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!-- swiper-slide-->
                                            @if(!empty($bestCategory))
                                            @foreach($bestCategory as $post)
                                            <div class="swiper-slide">
                                                <div class="grid-post-item  bold_gpi  fl-wrap">
                                                    <div class="grid-post-media gpm_sing">
                                                        <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                                        </div>
                                                        <div class="author-link">
                                                            <a href="author-single.html">
                                                                <img src="{{asset('upload/'.$post->admin->profile)}}" alt="">
                                                                <span>By {{$post->admin->fullname}}</span></a>
                                                        </div>
                                                        <div class="grid-post-media_title">
                                                            <a class="post-category-marker" href="category.html">{{$post->category->name}}</a>
                                                            <h4><a href="{{route('post',$post->slug)}}">{{$post->name}}</a>
                                                            </h4>
                                                            <span class="video-date"><i class="far fa-clock"></i>
                                                                {{$post->created_at}}</span>
                                                            <ul class="post-opt">
                                                                <li><i class="far fa-comments-alt"></i>
                                                                    @if(!empty($post->comment))
                                                                    <?php $sn = 0; ?>
                                                                    @foreach($post->comment
                                                                    as $comment)
                                                                    <?php $sn++; ?>
                                                                    @endforeach
                                                                    <?= $sn ?>
                                                                    @else
                                                                    <?= $sn = 0 ?>
                                                                    @endif

                                                                </li>
                                                                <li><i class="fal fa-eye"></i>
                                                                    {{$post->total_views}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif

                                        </div>
                                        <div class="sgs-pagination sgs_ver "></div>
                                    </div>
                                </div>
                            </div>
                            <!--grid-post-item end-->
                            <div class="more-post-wrap  fl-wrap">
                                <div class="list-post-wrap list-post-wrap_column fl-wrap">
                                    <div class="row">

                                        <!--list-post-->
                                        @if(!empty($recentupload))
                                        @foreach($recentupload as $post)
                                        <div class="col-md-6">
                                            <div class="list-post fl-wrap">
                                                <a class="post-category-marker" href="{{url('home/'.$post->category->slug)}}">{{$post->category->name}}</a>
                                                <div class="list-post-media">
                                                    <a href="{{route('post',$post->slug)}}">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <span class="post-media_title">&copy;
                                                        {{$post->name}}</span>
                                                </div>
                                                <div class="list-post-content">
                                                    <h3><a href="{{route('post',$post->slug)}}">
                                                            {{ Str::limit(strip_tags($post->body), 150, '...') }} </a>
                                                    </h3>
                                                    <span class="post-date"><i class="far fa-clock"></i>
                                                        {{$post->created_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="blog2.html" class="dark-btn fl-wrap"> Read all News </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- sidebar   -->
                    <div class="sidebar-content fl-wrap fix-bar">
                        <!-- box-widget -->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-content">
                                <!-- content-tabs-wrap -->
                                <div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
                                    <div class="content-tabs fl-wrap">
                                        <ul class="tabs-menu fl-wrap no-list-style">
                                            <li class="current"><a href="#tab-popular"> Popular News </a>
                                            </li>
                                            <li><a href="#tab-resent">Resent News</a></li>
                                        </ul>
                                    </div>
                                    <!--tabs -->
                                    <div class="tabs-container">
                                        <!--tab -->
                                        <div class="tab">
                                            <div id="tab-popular" class="tab-content first-tab">
                                                <div class="post-widget-container fl-wrap">
                                                    <!-- post-widget-item -->
                                                    <!-- post-widget-item -->
                                                    @if(!empty($popularPost))
                                                    @foreach($popularPost as $post)
                                                    <div class="post-widget-item fl-wrap">
                                                        <div class="post-widget-item-media">
                                                            <a href="{{route('post',$post->slug)}}"><img src="{{asset('upload/'.$post->image)}}" alt=""></a>
                                                        </div>
                                                        <div class="post-widget-item-content">
                                                            <h4><a href="{{route('post',$post->slug)}}">{{$post->name}}</a>
                                                            </h4>
                                                            <ul class="pwic_opt">
                                                                <li><span><i class="far fa-clock"></i>
                                                                        {{$post->created_at}}</span></li>
                                                                <li>
                                                                    @if(!empty($post->comment))
                                                                    <?php $sn = 0; ?>
                                                                    @foreach($post->comment as $comment)
                                                                    <?php $sn++; ?>
                                                                    @endforeach
                                                                    <span><i class="far fa-comments-alt"></i>
                                                                        <?= $sn; ?>
                                                                    </span>
                                                                    @endif

                                                                </li>
                                                                <li><span><i class="fal fa-eye"></i>
                                                                        {{$post->total_views}}</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    <!-- post-widget-item end -->
                                                    <!-- post-widget-item end -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--tab  end-->
                                        <!--tab -->
                                        <div class="tab">
                                            <div id="tab-resent" class="tab-content">
                                                <div class="post-widget-container fl-wrap">
                                                    @if(!empty($recentPost))
                                                    @foreach($recentPost as $post)
                                                    <div class="post-widget-item fl-wrap">
                                                        <div class="post-widget-item-media">
                                                            <a href="{{route('post',$post->slug)}}"><img src="{{asset('upload/'.$post->image)}}" alt=""></a>
                                                        </div>
                                                        <div class="post-widget-item-content">
                                                            <h4><a href="{{route('post',$post->slug)}}">{{$post->name}}</a>
                                                            </h4>
                                                            <ul class="pwic_opt">
                                                                <li><span><i class="far fa-clock"></i>
                                                                        {{$post->created_at}}</span></li>
                                                                <li><span><i class="far fa-comments-alt"></i>
                                                                        12</span>
                                                                </li>
                                                                <li><span><i class="fal fa-eye"></i> 654</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!--tab end-->
                                    </div>
                                    <!--tabs end-->
                                </div>
                                <!-- content-tabs-wrap end -->
                            </div>
                        </div>
                        <!-- box-widget  end -->
                        <!-- box-widget -->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-content">
                                <div id="weather-widget" class="ideaboxWeather" data-city="Lagos, Nigeria">
                                </div>
                            </div>
                        </div>
                        <!-- box-widget  end -->
                        <!-- box-widget -->
                        <div class="box-widget fl-wrap">
                            <div class="widget-title">Follow Us</div>
                            <div class="box-widget-content">
                                <div class="social-widget">
                                    <a href="https://facebook.com/jossyblog/" target="_blank" class="facebook-soc">
                                        <i class="fab fa-facebook-f"></i>
                                        <span class="soc-widget-title">Likes</span>
                                        <span class="soc-widget_counter">2640</span>
                                    </a>
                                    <a href="https://twitter.com/jossyblog/" target="_blank" class="twitter-soc">
                                        <i class="fab fa-twitter"></i>
                                        <span class="soc-widget-title">Followers</span>
                                        <span class="soc-widget_counter">1456</span>
                                    </a>
                                    <a href="https://yputube.com/jossyblog" target="_blank" class="youtube-soc">
                                        <i class="fab fa-youtube"></i>
                                        <span class="soc-widget-title">Followers</span>
                                        <span class="soc-widget_counter">1456</span>
                                    </a>
                                    <a href="https://instagram.com/jossy1blog/" target="_blank" class="instagram-soc">
                                        <i class="fab fa-instagram"></i>
                                        <span class="soc-widget-title">Followers</span>
                                        <span class="soc-widget_counter">1456</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- box-widget  end -->
                        <!-- box-widget -->
                        <div class="box-widget fl-wrap">
                            <div class="widget-title">Popular Tags</div>
                            <div class="box-widget-content">
                                <div class="tags-widget">
                                    @if(!empty($category))
                                    @foreach($category as $cat)
                                    <a href="{{route('blog.two',$cat->slug)}}">{{$cat->name}}</a>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- box-widget  end -->
                        <!-- box-widget -->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-content">
                                <div class="single-grid-slider slider_widget">
                                    <div class="slider_widget_title">Editor's Choice</div>
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!-- swiper-slide-->
                                            @if(!empty($top_post))
                                            @foreach($top_post as $post)
                                            <div class="swiper-slide">
                                                <div class="grid-post-item     fl-wrap">
                                                    <div class="grid-post-media gpm_sing">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                                            </div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                        <div class="grid-post-media_title">
                                                            <a class="post-category-marker" href="{{url('home/'.$post->category->slug)}}">{{$post->category->slug}}</a>
                                                            <h4><a href="{{route('post',$post->slug)}}">{{$post->name}}</a>
                                                            </h4>
                                                            <span class="video-date"><i class="far fa-clock"></i>{{$post->created_at}}</span>
                                                            <ul class="post-opt">
                                                                <li><i class="far fa-comments-alt"></i> 11
                                                                </li>
                                                                <li><i class="fal fa-eye"></i>
                                                                    {{$post->total_views}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            <!-- swiper-slide end-->

                                        </div>
                                        <div class="sgs-pagination sgs_hor "></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box-widget  end -->
                    </div>
                    <!-- sidebar  end -->
                </div>
            </div>
            <div class="limit-box fl-wrap"></div>
        </div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section class="dark-bg no-bottom-padding">
        <div class="container">
            <div class="main-video-wrap fl-wrap">
                <div class="video-main-cont">
                    <div class="video-section-title fl-wrap">
                        <h2>Featured Video</h2>
                        <h4>Stay up-to-date</h4>
                        <a href="#category.html">View All <i class="fas fa-caret-right"></i></a>
                    </div>
                    <a class="video-holder vh-main fl-wrap  image-popup" href="#">
                        <div class="bg"></div>
                        <div class="overlay"></div>
                        <div class="big_prom"> <i class="fas fa-play"></i></div>
                    </a>
                    <div class="video-holder-title fl-wrap">
                        <div class="video-holder-title_item"><a href="#"></a></div>
                        <span class="video-date"><i class="far fa-clock"></i> <strong></strong></span>
                        <a class="post-category-marker" href="category.html"></a>
                    </div>
                    <div class="vh-preloader"></div>
                </div>
                <!-- video-links-wrap   -->
                <div class="video-links-wrap">
                    <!-- video-item  -->
                    <!-- <div class="video-item video-item_active fl-wrap" data-url="post-single2.html"
                        data-video-link="https://www.youtube.com/watch?v=VLoqKdRxPSc">
                        <div class="video-item-img fl-wrap">
                            <img src="images/all/33.jpg" class="respimg" alt="">
                            <div class="play-icon"><i class="fas fa-play"></i></div>
                        </div>
                        <div class="video-item-title">
                            <h4>London Stay Most Popular City</h4>
                            <span class="video-date"><i class="far fa-clock"></i> <strong>25may
                                    2022</strong></span>
                        </div>
                        <a class="post-category-marker" href="category.html">Business</a>
                    </div> -->
                    <!--video-item end   -->
                    <!-- video-item  -->
                    @if(!empty($popularvideo))
                    @foreach($popularvideo as $post)
                    <div class="video-item fl-wrap" data-url="{{route('post',$post->slug)}}" data-video-link="{{asset('videos/'.$post->video)}}">
                        <div class="video-item-img fl-wrap">
                            <img src="{{asset('upload/'.$post->image)}}" class="respimg" alt="">
                            <div class="play-icon"><i class="fas fa-play"></i></div>
                        </div>
                        <div class="video-item-title">
                            <h4>Oculus in Trending Now</h4>
                            <span class="video-date"><i class="far fa-clock"></i>
                                <strong>{{$post->created_at}}</strong></span>
                        </div>
                        <a class="post-category-marker" href="{{url('home/'.$post->category->slug)}}">{{$post->category->name}}</a>
                    </div>
                    @endforeach
                    @endif
                    <!--video-item end   -->

                </div>
                <!-- video-links-wrap end   -->
            </div>
        </div>
        <div class="video_carousel-wrap fl-wrap">
            <div class="container">
                <div class="video_carousel-container">
                    <div class="video_carousel_title">
                        <h4>Popular Videos</h4>
                        <div class="vc-pagination pag-style"></div>
                    </div>
                    <!-- fw-carousel  -->
                    <div class="video_carousel  lightgallery">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- swiper-slide-->
                                @if(!empty($popularvideo))
                                @foreach($popularvideo as $post)
                                <div class="swiper-slide">
                                    <!-- video-item  -->
                                    <div class="video-item fl-wrap">
                                        <div class="video-item-img fl-wrap">
                                            <img src="{{asset('upload/'.$post->image)}}" class="respimg" alt="">
                                            <a class="play-icon image-popup" href="{{asset('videos/'.$post->video)}}"><i class="fas fa-play"></i></a>
                                        </div>
                                        <div class="video-item-title">
                                            <h4><a href="{{route('post',$post->slug)}}">{{$post->name}}</a></h4>
                                            <span class="video-date"><i class="far fa-clock"></i>
                                                - {{$post->created_at}}</span>
                                        </div>
                                        <a class="post-category-marker" href="{{url('home/'.$post->category->slug)}}">{{$post->category->name}}</a>
                                    </div>
                                    <!--video-item end   -->
                                </div>
                                @endforeach
                                @endif
                                <!-- swiper-slide end-->

                            </div>
                        </div>
                    </div>
                    <!-- fw-carousel end -->
                    <div class="cc-prev cc_btn"><i class="fas fa-caret-left"></i></div>
                    <div class="cc-next cc_btn"><i class="fas fa-caret-right"></i></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section  -->
    <section>
        <div class="container">
            <div class="section-title sect_dec">
                <h2>Best In Categories</h2>
                <h4>Don't miss daily news</h4>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="list-post-wrap list-post-wrap_column list-post-wrap_column_fw">
                        <!--list-post-->
                        <div class="list-post fl-wrap">
                            <a class="post-category-marker" href="{{route('blog.two',$best_post->category->slug)}}">{{$best_post->category->slug}}</a>
                            <div class="list-post-media">
                                <a href="post-single.html">
                                    <div class="bg-wrap">
                                        <div class="bg" data-bg="{{asset('upload/'.$best_post->image)}}"></div>
                                    </div>
                                </a>
                                <span class="post-media_title">&copy; {{$best_post->name}}</span>
                            </div>
                            <div class="list-post-content">
                                <h3><a href="post-single.html">{{$best_post->name}}</a></h3>
                                <span class="post-date"><i class="far fa-clock"></i> {{$best_post->created_at}}</span>
                                <p>{{ Str::limit(strip_tags($best_post->body), 150, '...') }} </p>
                                <ul class="post-opt">
                                    <li><i class="far fa-comments-alt"></i>
                                        <?php
                                        $sn = 0;
                                        foreach ($best_post->comment as $comment) {
                                            $sn++;
                                        } ?>
                                        <?= $sn ?>
                                    </li>
                                    <li><i class="fal fa-eye"></i> {{$best_post->total_views}} </li>
                                </ul>
                                <div class="author-link"><a href="author-single.html"><img src="{{asset('upload/'.$best_post->admin->profile)}}" alt="">
                                        <span>By {{$best_post->admin->fullname}}</span></a>
                                </div>
                            </div>
                        </div>
                        <!--list-post end-->
                    </div>
                    <a href="blog2.html" class="dark-btn fl-wrap"> Read all News </a>
                </div>
                <div class="col-md-7">
                    <div class="picker-wrap-container fl-wrap">
                        <div class="picker-wrap-controls">
                            <ul class="fl-wrap">
                                <li><span class="pwc_up"><i class="fas fa-caret-up"></i></span></li>
                                <li><span class="pwc_pause"><i class="fas fa-pause"></i></span></li>
                                <li><span class="pwc_down"><i class="fas fa-caret-down"></i></span></li>
                            </ul>
                        </div>
                        <div class="picker-wrap fl-wrap">
                            <div class="list-post-wrap  fl-wrap">

                                <!--list-post-->
                                @if(!empty($bestCategory))
                                @foreach($bestCategory as $post)
                                <div class="list-post fl-wrap">
                                    <div class="list-post-media">
                                        <a href="{{route('post',$post->slug)}}">
                                            <div class="bg-wrap">
                                                <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                                </div>
                                            </div>
                                        </a>
                                        <span class="post-media_title">&copy; Image Copyrights Title</span>
                                    </div>
                                    <div class="list-post-content">
                                        <a class="post-category-marker" href="{{route('home',$post->category->slug)}}">{{$post->category->slug}}</a>
                                        <h3><a href="post-single.html">{{$post->name}}</a>
                                        </h3>
                                        <span class="post-date"><i class="far fa-clock"></i>
                                            {{$post->created_at}}</span>
                                        <p> {{ Str::limit(strip_tags($post->body), 150, '...') }} </p>
                                        <ul class="post-opt">
                                            <li><i class="far fa-comments-alt"></i>
                                                @if(!empty($post->comment))
                                                <?php $sn = 0; ?>
                                                @foreach($post->comment as $comment)
                                                <?php $sn++; ?>
                                                @endforeach
                                                <?= $sn; ?>
                                                @endif
                                            </li>
                                            <li><i class="fal fa-eye"></i> {{$post->total_views}}</li>
                                        </ul>
                                        <div class="author-link"><a href="author-single.html"><img src="{{asset('upload/'.$post->admin->profile)}}" alt=""> <span>By
                                                    {{$post->admin->fullname}}
                                                </span></a></div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <!--list-post end-->

                            </div>
                        </div>
                        <div class="controls-limit fl-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="limit-box"></div>
    </section>
    <!-- section end -->
    <!-- section -->
    <section class="no-padding">
        <div class="fs-carousel-wrap">
            <div class="fs-carousel-wrap_title">
                <div class="fs-carousel-wrap_title-wrap fl-wrap">
                    <h4>Trending News</h4>
                    <h5>Don't Miss And Stay Up-to-date. Top pic for you.</h5>
                </div>
                <div class="abs_bg"></div>
                <div class="gs-controls">
                    <div class="gs_button gc-button-next"><i class="fas fa-caret-right"></i></div>
                    <div class="gs_button gc-button-prev"><i class="fas fa-caret-left"></i></div>
                </div>
            </div>
            <div class="fs-carousel fl-wrap">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- swiper-slide-->
                        @if(!empty($recentupload))
                        @foreach($recentupload as $post)
                        <div class="swiper-slide">
                            <div class="grid-post-item  bold_gpi  fl-wrap">
                                <div class="grid-post-media gpm_sing">
                                    <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                    </div>
                                    <div class="author-link"><a href="author-single.html"><img src="{{asset('upload/'.$post->admin->profile)}}" alt="">
                                            <span>By
                                                {{$post->admin->fullname}}</span></a></div>
                                    <div class="grid-post-media_title">
                                        <a class="post-category-marker" href="{{url('home/'.$post->category->slug)}}">{{$post->category->name}}</a>
                                        <h4><a href="{{route('post',$post->slug)}}">{{$post->name}}</a></h4>
                                        <span class="video-date"><i class="far fa-clock"></i>
                                            {{$post->created_at}}</span>
                                        <ul class="post-opt">
                                            <li><i class="far fa-comments-alt"></i>
                                                @if(!empty($post->comment))
                                                <?php $sn = 0; ?>
                                                @foreach($post->comment as $comment)
                                                <?php $sn++; ?>
                                                @endforeach
                                                <?= $sn; ?>
                                                @endif
                                            </li>
                                            <li><i class="fal fa-eye"></i> {{$post->total_views}} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- swiper-slide end-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section  -->
    <div class="gray-bg ad-wrap fl-wrap">
        <div class="content-banner-wrap">
            @if(!empty($footer_adverts))
            @foreach($footer_adverts as $post)
            <img src="{{asset('upload/'.$post->banner)}}" class="respimg" alt="" style="height: 200px;">
            @endforeach
            @endif
        </div>
    </div>
    <!-- section end -->
</div>
<!-- content  end-->
<!-- footer -->

@endsection