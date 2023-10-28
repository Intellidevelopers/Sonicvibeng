@extends('layout.blog-app')
@section('content')
<!-- content    -->
<div class="content">
    <!--section   -->
    <section class="hero-section">
        <div class="bg-wrap hero-section_bg">
            <div class="bg" data-bg="{{asset('home_assets/images/bg/11.jpg')}}"></div>
        </div>
        <div class="container">
            <div class="hero-section_title">
                <h2>Author Page</h2>
            </div>
            <div class="clearfix"></div>
            <div class="breadcrumbs-list fl-wrap">
                <a href="{{route('home')}}">Home</a> <a href="#">Author</a> <span>Author details</span>
            </div>
            <div class="scroll-down-wrap scw_transparent">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down To Discover</span>
            </div>
        </div>
    </section>
    <!-- section end  -->
    <!--section   -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_fix-bar fl-wrap">
                        <div class="profile-card-wrap fl-wrap">
                            <div class="profile-card_media fl-wrap">
                                <img src="{{asset('upload/'.$user->profile)}}" alt="">
                                <div class="profile-card_media_content">
                                    <h4>{{$user->fullname}}</h4>
                                    <h5>8 Years of Membership</h5>
                                </div>
                                <div class="abs_bg"></div>
                                <div class="profile-card-stats">
                                    <ul>
                                        <li><span>27</span>Articles</li>
                                        <li><span>1567</span> Views</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="profile-card_content">
                                <h4>About</h4>
                                <p>{{$settings->about}}</p>

                                <div class="pc_contacts">
                                    <ul>
                                        <li>
                                            <span>Write:</span> <a
                                                href="mailto:jossyblog1@gmail.com">jossyblog1@gmail.com</a>
                                        </li>
                                        <li>
                                            <span>Call:</span> <a href="tel:+447724061019">+447724061019</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="profile-card-footer fl-wrap">
                                <div class="profile-card-footer_title">Follow: </div>
                                <div class="profile-card-social">
                                    <ul>
                                        <li><a href="https://twitter.com/jossyblog/" target="_blank"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://instagram.com/jossy1blog/" target="_blank"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                        <li><a href="https://pinterest.com/" target="_blank"><i
                                                    class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="https://youtube.com/jossyblog" target="_blank"><i
                                                    class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="main-container fl-wrap fix-container-init">
                        <div class="section-title">
                            <h3>Jossyblog Articles:</h3>
                            <div class="steader_opt steader_opt_abs">
                                <select name="filter" id="list" data-placeholder="Persons"
                                    class="style-select no-search-select">
                                    <option>Latest</option>
                                    <option>Most Read</option>
                                    <option>Most Viewed</option>
                                    <option>Most Commented</option>
                                </select>
                            </div>
                        </div>
                        <!--grid-post-wrap-->
                        <div class="grid-post-wrap">
                            <div class="row">
                                <!--grid-post-item-->
                                @if(!empty($blogpost))
                                @foreach($blogpost as $post)
                                <div class="col-md-6">
                                    <div class="grid-post-item  bold_gpi  fl-wrap">
                                        <div class="grid-post-media">
                                            <a href="{{route('post',$post->slug)}}" class="gpm_link">
                                                <div class="bg-wrap">
                                                    <div class="bg" data-bg="{{asset('upload/'.$post->image)}}"></div>
                                                </div>
                                            </a>
                                            <span class="post-media_title">&copy; {{$post->name}}</span>
                                        </div>
                                        <a class="post-category-marker purp-bg"
                                            href="{{route('category',$post->category->slug)}}">{{$post->category->name}}</a>
                                        <div class="grid-post-content">
                                            <h3><a href="post-single.html">{{$post->name}}</a>
                                            </h3>
                                            <span class="post-date"><i class="far fa-clock"></i>
                                                {{$post->created_at}}</span>
                                            <p> {!! Str::limit($post->body, 150, '...') !!}</p>
                                        </div>
                                        <div class="grid-post-footer">
                                            <div class="author-link"><a href="{{route('author',$post->admin->id)}}"><img
                                                        src="{{asset('upload/'.$post->admin->profile)}}" alt="">
                                                    <span>By
                                                        {{$post->admin->fullname}}</span></a></div>
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
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <!--grid-post-item end-->

                            </div>
                        </div>
                        <!--grid-post-wrap end-->
                        <div class="clearfix"></div>
                        <div class="load-more_btn"><i class="fal fa-undo"></i>Load More</div>
                        <!--pagination-->
                        <div class="pagination">
                            <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i></a>
                            <a href="#">01.</a>
                            <a href="#" class="current-page">02.</a>
                            <a href="#">03.</a>
                            <a href="#">04.</a>
                            <a href="#" class="nextposts-link"><i class="fas fa-caret-right"></i></a>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
        <div class="limit-box fl-wrap"></div>
    </section>
    <!-- section end -->
    <!-- section  -->
    <div class="gray-bg ad-wrap fl-wrap">
        <div class="content-banner-wrap">
            @if(!empty($footer_adverts))
            @foreach($footer_adverts as $post)
            <img src="{{asset('upload/'.$post->banner)}}" class="respimg" alt="">
            @endforeach
            @endif
        </div>
    </div>
    <!-- section end -->
</div>
<!-- content  end-->
@endsection