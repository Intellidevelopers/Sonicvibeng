@extends('layout.blog-app')
@section('content')
<div class="content">
    <!--breadcrumbs-header   -->
    <div class="breadcrumbs-header fl-wrap">
        <div class="container">
            <div class="breadcrumbs-header_url">
                <a href="{{route('home')}}">Home</a><span></span>
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
    <!-- breadcrumbs-header end  -->
    <!--section   -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="main-container fl-wrap fix-container-init">
                        <div class="section-title">
                            <h2>Most Recent World News</h2>
                            <h4>Don't miss daily news</h4>
                            <div class="steader_opt steader_opt_abs">
                                <select name="filter" id="list" data-placeholder="Persons" class="style-select no-search-select">
                                    <option>Latest</option>
                                    <option>Most Read</option>
                                    <option>Most Viewed</option>
                                    <option>Most Commented</option>
                                </select>
                            </div>
                        </div>
                        <div class="list-post-wrap list-post-wrap_column list-post-wrap_column_fw">
                            <!--list-post-->
                            @if(!empty($results))
                            @foreach($results as $post)
                            <div class="list-post fl-wrap">
                                <a class="post-category-marker" href="{{route('blog',$post->category->slug)}}">{{$post->category->name}}</a>
                                <div class="list-post-media">
                                    <a href="{{route('post',$post->slug)}}">
                                        <div class="bg-wrap">
                                            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}"></div>
                                        </div>
                                    </a>
                                    <span class="post-media_title">&copy; {{$post->name}}</span>
                                </div>
                                <div class="list-post-content">
                                    <h3><a href="{{route('post',$post->slug)}}">{{$post->name}}</a></h3>
                                    <span class="post-date"><i class="far fa-clock"></i> {{$post->created_at}}</span>
                                    <p> {{ Str::limit(strip_tags($post->body), 150, '...') }} </p>
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
                                        <li><i class="fal fa-eye"></i> {{$post->total_views}} </li>
                                    </ul>
                                    <div class="author-link"><a href="{{route('author',$post->admin->id)}}"><img src="{{asset('upload/'.$post->admin->profile)}}" alt="">
                                            <span>By {{$post->admin->fullname}}</span></a></div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h4>No Data found</h4>
                            @endif
                            <!--list-post end-->
                            <!--list-post-->
                            @if(!empty($blogpost))
                            @foreach($blogpost as $post)
                            <div class="list-post fl-wrap">
                                <a class="post-category-marker" href="{{route('blog',$post->category->slug)}}">{{$post->category->name}}</a>
                                <div class="list-post-media">
                                    <a href="{{route('post',$post->slug)}}">
                                        <div class="bg-wrap">
                                            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}"></div>
                                        </div>
                                    </a>
                                    <span class="post-media_title">&copy; {{$post->name}}</span>
                                </div>
                                <div class="list-post-content">
                                    <h3><a href="post-single.html">{{$post->name}}</a></h3>
                                    <span class="post-date"><i class="far fa-clock"></i> {{$post->created_at}}</span>
                                    <p> {{ Str::limit(strip_tags($post->body), 150, '...') }} </p>
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
                                        <li><i class="fal fa-eye"></i> {{$post->total_views}} </li>
                                    </ul>
                                    <div class="author-link"><a href="{{route('author',$post->admin->id)}}"><img src="{{asset('upload/'.$post->admin->profile)}}" alt="">
                                            <span>By {{$post->admin->fullname}}</span></a></div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <!--list-post end-->
                        </div>
                        <div class="clearfix"></div>
                        <!-- <div class="load-more_btn lmb_center-align"><i class="fal fa-undo"></i>Load More</div> -->
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <!-- sidebar   -->
                    <div class="sidebar-content fl-wrap fixed-bar">
                        <!-- box-widget -->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-content">
                                <div class="search-widget fl-wrap">
                                    <form action="{{route('search.action')}}" method="post">
                                        @csrf
                                        <input name="word" id="se12" type="text" class="search" placeholder="Search..." />
                                        <button type="submit" class="search-submit2" id="submit_btn12"><i class="far fa-search"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- box-widget  end -->
                        <!-- box-widget -->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-content">
                                <div class="banner-widget fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg  " data-bg="images/bg/7.jpg"></div>
                                    </div>
                                    <div class="banner-widget_content">
                                        <h5>Visit our awesome merch and souvenir online shop.</h5>
                                        <a href="#" class="btn float-btn color-bg small-btn">Our shop</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box-widget  end -->
                        <!-- box-widget -->
                        <div class="box-widget fl-wrap">
                            <div class="widget-title">Categories</div>
                            <div class="box-widget-content">
                                <ul class="cat-wid-list">
                                    @if(!empty($category))
                                    @foreach($category as $cat)
                                    <li><a href="{{route('blog.two',$cat->slug)}}">{{$cat->name}}</a><span>0</span></li>

                                    @endforeach
                                    @endif
                                </ul>
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
                            <div class="box-widget-content">
                                <!-- content-tabs-wrap -->
                                <div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
                                    <div class="content-tabs fl-wrap">
                                        <ul class="tabs-menu fl-wrap no-list-style">
                                            <li class="current"><a href="#tab-popular"> Popular News </a></li>
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
                                                                <li><span><i class="far fa-comments-alt"></i>
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
                                                                    </span>
                                                                </li>
                                                                <li><span><i class="fal fa-eye"></i>
                                                                        {{$post->total_views}}</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    <!-- post-widget-item end -->

                                                </div>
                                            </div>
                                        </div>
                                        <!--tab  end-->
                                        <!--tab -->
                                        <div class="tab">
                                            <div id="tab-resent" class="tab-content">
                                                <div class="post-widget-container fl-wrap">
                                                    <!-- post-widget-item -->
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
                                                                <li><span><i class="far fa-comments-alt"></i> </span>
                                                                </li>
                                                                <li><span><i class="fal fa-eye"></i>
                                                                        {{$post->total_views}}</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    <!-- post-widget-item end -->

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
                    </div>
                    <!-- sidebar  end -->
                </div>
            </div>
            <div class="limit-box fl-wrap"></div>
        </div>
    </section>
    <!-- section end -->
    <!-- section  -->
    @if(!empty($footer_adverts))
    @foreach($footer_adverts as $post)
    <div class="gray-bg ad-wrap fl-wrap">
        <div class="content-banner-wrap">
            <img src="{{asset('upload/'.$post->banner)}}" class="respimg" alt="">
        </div>
    </div>
    @endforeach
    @endif
    <!-- section end -->
</div>
@endsection