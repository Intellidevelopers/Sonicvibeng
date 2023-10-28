@extends('layout.blog-app')
@section('content')
<div class="content">
    <!--section   -->
    <section class="hero-section">
        <div class="bg-wrap hero-section_bg">
            <div class="bg" data-bg="{{asset('upload/'.$post->image)}}"></div>
        </div>
        <div class="container">
            <div class="hero-section_title hs_single-post">
                <a class="post-category-marker color-bg" href="{{url('home/'.$post->category->slug)}}">{{$post->category->name}}</a>
                <span class="post-date"><i class="far fa-clock"></i> {{$post->created_at}}</span>
                <div class="clearfix"></div>
                <h2>{{$post->name}}</h2>
                <h5> {{ Str::limit(strip_tags($post->body), 150, '...') }} </h5>
                <div class="author-link"><a href="{{route('author',$post->admin->id)}}">
                        <img src="{{asset('upload/'.$post->admin->profile)}}" alt="" style="height: 50px;">
                        <span>By
                            {{$post->admin->fullname}}</span></a>
                    </dv>
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
                </div>
                <div class="clearfix"></div>
                <div class="scroll-down-wrap scw_transparent">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                    <span>Scroll Down To Discover</span>
                </div>
            </div>
    </section>
    <!-- section end  -->
    <div class="breadcrumbs-section fl-wrap">
        <div class="container">
            <div class="breadcrumbs-header_url">
                <a href="{{route('home')}}">Home</a><span>{{$post->category->name}}</span>
            </div>
            <div class="share-holder hor-share">
                <div class="share-title">Share:</div>
                <div class="share-container  isShare"></div>
            </div>
        </div>
        <div class="pwh_bg"></div>
    </div>
    <!--section   -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-container fl-wrap fix-container-init">
                        <!-- single-post-media   -->
                        <div class="single-post-media fl-wrap">
                            <a class="video-holder fl-wrap  image-popup" href="{{asset('videos/'.$post->video)}}">
                                <div class="bg" data-bg="{{asset('upload/'.$post->image)}}"></div>
                                <div class="overlay"></div>
                                <div class="big_prom"> <i class="fas fa-play"></i></div>
                            </a>
                        </div>
                        <!-- single-post-media end   -->
                        <!-- single-post-content   -->
                        <div class="single-post-content  fl-wrap">
                            <div class="fs-wrap smpar fl-wrap">
                                <div class="fontSize"><span class="fs_title">Font size: </span><input type="text" class="rage-slider" data-step="1" data-min="12" data-max="15" value="12"></div>
                                <div class="show-more-snopt smact"><i class="fal fa-ellipsis-v"></i></div>
                                <div class="show-more-snopt-tooltip">
                                    <a href="#comments" class="custom-scroll-link"> <i class="fas fa-comment-alt"></i>
                                        Write a Comment</a>
                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                </div>
                                <a class="print-btn" href="javascript:window.print()" data-microtip-position="bottom"><span>Print</span><i class="fal fa-print"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="single-post-content_text" id="font_chage">
                                <p class="has-drop-cap"></p>


                                <div class="single-post-content_text_media fl-wrap">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12"><img src="{{asset('upload/'.$post->image)}}" alt="" class="respimg"></div>
                                        <div class="col-md-12 ">
                                            <p class="text-danger"> </p>
                                            <p style="text-align: left !important;">{!! nl2br($post->body) !!}</p>

                                        </div>
                                    </div>
                                </div>
                                <blockquote>
                                    @if(!empty($quotes))
                                    @foreach($quotes as $quote)
                                    <p>{{$quote->name}}</p>
                                    <hr>
                                    @endforeach
                                    @endif
                                </blockquote>


                                <h4 class="mb_head">Middle Post Heading</h4>
                                <div class="single-post-content_text_media fl-wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="has-drop-cap"> </p>
                                        </div>
                                        <div class="col-md-6"><img src="{{asset('upload/'.$post->image)}}" alt="" class="respimg">
                                        </div>
                                    </div>
                                </div>
                                <p> </p>


                            </div>
                            <div class="single-post-footer fl-wrap">
                                <div class="post-single-tags">
                                    <span class="tags-title"><i class="fas fa-tag"></i> Tags : </span>
                                    <div class="tags-widget">
                                        @if(!empty($category))
                                        @foreach($category as $cat)
                                        <a href="{{route('blog',$cat->slug)}}">{{$cat->name}}</a>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- single-post-nav"   -->
                            {{--<div class="single-post-nav fl-wrap">
                                <a href="{{route('post',$previous->slug)}}" class="single-post-nav_prev spn_box">
                            <div class="spn_box_img">
                                <img src="{{asset('upload/'.$previous->image)}}" class="respimg" alt="">
                            </div>
                            <div class="spn-box-content">
                                <span class="spn-box-content_subtitle"><i class="fas fa-caret-left"></i> Prev
                                    Post</span>
                                <span class="spn-box-content_title">{{$previous->name}}</span>
                            </div>
                            </a>
                            <a href="{{route('post',$next->slug)}}" class="single-post-nav_next spn_box">
                                <div class="spn_box_img">
                                    <img src="{{asset('upload/'.$next->image)}}" class="respimg" alt="">
                                </div>
                                <div class="spn-box-content">
                                    <span class="spn-box-content_subtitle">Next Post <i class="fas fa-caret-right"></i></span>
                                    <span class="spn-box-content_title">{{$next->name}}</span>
                                </div>
                            </a>
                        </div>--}}
                        <!-- single-post-nav"  end   -->
                    </div>
                    <!-- single-post-content  end   -->
                    <div class="limit-box2 fl-wrap"></div>
                    <!-- post-author-->
                    <div class="post-author fl-wrap">
                        <div class="author-img">
                            <img src="{{asset('upload/'.$post->admin->profile)}}" alt="">
                        </div>
                        <div class="author-content fl-wrap">
                            <h5>Written By <a href="{{route('author',$post->admin->id)}}">{{$post->admin->fullname}}</a>
                            </h5>
                            <p>About</p>
                        </div>
                        <div class="profile-card-footer fl-wrap">
                            <a href="{{route('author',$post->admin->id)}}" class="post-author_link">View Profile <i class="fas fa-caret-right"></i></a>
                            <div class="profile-card-footer_soc">
                                <div class="profile-card-footer_title">Follow: </div>
                                <div class="profile-card-social">
                                    <ul>
                                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--post-author end-->
                    <div class="more-post-wrap  fl-wrap">
                        <div class="pr-subtitle prs_big">Related Posts</div>
                        <div class="list-post-wrap list-post-wrap_column fl-wrap">
                            <div class="row">
                                @if(!empty($relatedPost))
                                @foreach($relatedPost as $post)
                                <div class="col-md-6">
                                    <!--list-post-->
                                    <div class="list-post fl-wrap">
                                        <a class="post-category-marker" href="{{url('home/'.$post->category->slug)}}">{{$post->category->name}}</a>
                                        <div class="list-post-media">
                                            <a href="{{route('post',$post->slug)}}">
                                                <div class="bg-wrap">
                                                    <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                                    </div>
                                                </div>
                                            </a>
                                            <span class="post-media_title">&copy; {{$post->name}}</span>
                                        </div>
                                        <div class="list-post-content">
                                            <h3><a href="{{route('post',$post->slug)}}">
                                                    {{ Str::limit(strip_tags($post->body), 150, '...') }} </a>
                                            </h3>
                                            <span class="post-date"><i class="far fa-clock"></i>
                                                {{$post->created_at}}</span>
                                        </div>
                                    </div>
                                    <!--list-post end-->
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--comments  -->
                    <div id="comments" class="single-post-comm fl-wrap">
                        <div class="pr-subtitle prs_big">Commnets <span>3</span></div>
                        <ul class="commentlist clearafix">
                            @if(!empty($comments))
                            @foreach($comments as $comment)
                            <li class="comment">
                                <div class="comment-author">
                                    <img alt="" src="{{asset('upload/'.$comment->profile)}}" width="50" height="50">
                                </div>
                                <div class="comment-body smpar">
                                    <h4><a href="#">{{$comment->name}}</a></h4>
                                    <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                    <div class="show-more-snopt-tooltip bxwt">
                                        <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                        <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <p>{!!$comment->message!!}</p>
                                    <button class="comment-reply-link showComment"><i class=" fas fa-reply"></i>
                                        Reply</button>
                                    <div class="comment-meta"><i class="far fa-clock"></i> {{$comment->created_at}}
                                    </div>
                                    <div class="comment-body_dec"></div>
                                </div>
                            </li>

                            @foreach ($comment->replies as $reply)
                            <li class="comment comment_reply">
                                <div class="comment-author">
                                    <img alt="" src="{{asset('upload/'.$reply->profile)}}" width="50" height="50">
                                </div>
                                <div class="comment-body smpar">
                                    <h4><a href="#">{{$reply->name}}</a></h4>
                                    <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                    <div class="show-more-snopt-tooltip bxwt">
                                        <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                        <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <p> {!!$reply->message!!}</p>
                                    <a class="comment-reply-link" href="#"><i class="fas fa-reply"></i> Reply</a>
                                    <div class="comment-meta"><i class="far fa-clock"></i> {{$reply->created_at}}
                                    </div>
                                    <div class=" comment-body_dec">
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <div class="comment" style="display: none;">
                                <form id="add-comment" action="{{route('add.replycomment')}}" method="post" class="add-comment custom-form">
                                    @csrf
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="name" placeholder="Your Name *" />

                                            </div>
                                            <input type="hidden" name="id" value="{{$post->id}}">
                                            <input type="hidden" name="commentid" value="{{$comment->id}}">
                                            <div class="col-md-6">
                                                <input type="email" name="email" placeholder="Email Address*" />
                                            </div>
                                        </div>
                                        <textarea placeholder="Your Comment:" name="comment"></textarea>
                                    </fieldset>
                                    <button class="btn float-btn color-btn" type="submit">
                                        Submit Comment <i class="fas fa-caret-right"></i> </button>
                                </form>
                            </div>
                            @endforeach
                            @endif


                        </ul>
                        <div class="clearfix"></div>
                        <div id="addcom" class="clearafix">
                            <div class="pr-subtitle"> Leave A Comment <i class="fas fa-caret-down"></i></div>
                            <div class="comment-reply-form fl-wrap">
                                <form id="add-comment" action="{{route('add.comment')}}" method="post" class="add-comment custom-form">
                                    @csrf
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="name" placeholder="Your Name *" />

                                            </div>
                                            <input type="hidden" name="id" value="{{$post->id}}">
                                            <div class="col-md-6">
                                                <input type="email" name="email" placeholder="Email Address*" />
                                            </div>
                                        </div>
                                        <textarea placeholder="Your Comment:" name="comment"></textarea>
                                    </fieldset>
                                    <button class="btn float-btn color-btn" type="submit">
                                        Submit Comment <i class="fas fa-caret-right"></i> </button>
                                </form>
                            </div>
                        </div>
                        <!--end respond-->
                    </div>
                    <!--comments end -->
                </div>
            </div>
            <div class="col-md-4">
                <!-- sidebar   -->
                <div class="sidebar-content fl-wrap fixed-bar">
                    <!-- box-widget -->
                    <div class="box-widget fl-wrap">
                        <div class="box-widget-content">
                            <div class="search-widget fl-wrap">
                                <form action="#">
                                    <input name="se" id="se12" type="text" class="search" placeholder="Search..." value="" />
                                    <button class="search-submit2" id="submit_btn12"><i class="far fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- box-widget  end -->
                    <!-- box-widget -->
                    <div class="box-widget fl-wrap">
                        <div class="widget-title">Cetegories</div>
                        <div class="box-widget-content">
                            <div class="sb-categories_bg">
                                <!-- sb-categories_bg_item -->
                                @if(!empty($category))
                                @foreach($category as $cat)
                                <a href="{{url('home/'.$cat->slug)}}" class="sb-categories_bg_item">
                                    <div class="bg-wrap">
                                        <div class="bg" data-bg="{{asset('upload/'.$cat->banner)}}"></div>
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="spb-categories_title"><span>01</span>{{$cat->name}}</div>
                                    <div class="spb-categories_counter">66</div>
                                </a>
                                @endforeach
                                @endif
                                <!-- sb-categories_bg_item  end-->

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
                            <div class="single-grid-slider slider_widget">
                                <div class="slider_widget_title">Editor's Choice</div>
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <!-- swiper-slide-->
                                        @if(!empty($popularPost))
                                        @foreach($popularPost as $post)
                                        <div class="swiper-slide">
                                            <div class="grid-post-item fl-wrap">
                                                <div class="grid-post-media gpm_sing">
                                                    <div class="bg-wrap">
                                                        <div class="bg" data-bg="{{asset('upload/'.$post->image)}}">
                                                        </div>
                                                        <div class="overlay"></div>
                                                    </div>
                                                    <div class="grid-post-media_title">
                                                        <a class="post-category-marker" href="{{route('blog',$post->category->slug)}}">{{$post->category->name}}</a>
                                                        <h4><a href="{{route('post',$post->slug)}}">{{$post->name}}</a>
                                                        </h4>
                                                        <span class="video-date"><i class="far fa-clock"></i>{{$post->created_at}}</span>
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
                                                                @endif </li>
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
                                    <div class="sgs-pagination sgs_hor "></div>
                                </div>
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
                                                            <li><span><i class="far fa-comments-alt"></i> 12</span>
                                                            </li>
                                                            <li><span><i class="fal fa-eye"></i> 654</span></li>
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
<script>
    $(document).ready(function() {
        $(".showComment").click(function() {
            alert("how are you");
            $(".comment").show();
        });
    });
</script>
@endsection