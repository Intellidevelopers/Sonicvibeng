@extends('layout.blog-app')
@section('content')
<div class="content">
    <div class="breadcrumbs-header fl-wrap">
        <div class="container">
            <div class="breadcrumbs-header_url">
                <a href="{{route('home')}}">Home</a><span>Recent Post</span>
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
    <!--section   -->
    <section>
        <div class="container">
            <div class="main-container fl-wrap">
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
                <!--grid-post-wrap-->
                <div class="grid-post-wrap gallery-items">
                    <!--grid-post-item-->

                    @if(!empty($blogpost))
                    @foreach($blogpost as $post)
                    <div class="gallery-item">
                        <div class="grid-post-item  bold_gpi  fl-wrap">
                            <div class="grid-post-media">
                                <a href="{{route('post',$post->slug)}}" class="gpm_link">
                                    <div class="bg-wrap">
                                        <div class="bg" data-bg="{{asset('upload/'.$post->image)}}"></div>
                                    </div>
                                </a>
                                <span class="post-media_title">&copy; {{$post->name}}</span>
                            </div>
                            <a class="post-category-marker purp-bg" href="{{url('home/'.$post->category->slug)}}">{{$post->category->name}}</a>
                            <div class="grid-post-content">
                                <h3><a href="{{route('post',$post->slug)}}">{{$post->name}}</a></h3>
                                <span class="post-date"><i class="far fa-clock"></i> {{$post->created_at}}</span>
                                <p> {{ Str::limit(strip_tags($post->body), 150, '...') }} </p>
                            </div>
                            <div class="grid-post-footer">
                                <div class="author-link"><a href="{{route('author',$post->admin->id)}}"><img src="{{asset('upload/'.$post->admin->profile)}}" alt=""> <span>By
                                            {{$post->admin->fullname}}</span></a></div>
                                <ul class=" post-opt">
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
                    @endforeach
                    @endif
                    <!--grid-post-item end-->


                </div>
                <!--grid-post-wrap end-->
                <div class="clearfix"></div>
                <div class="load-more_btn"><i class="fal fa-undo"></i>Load More</div>
                <!--pagination-->
                <div class="pagination">
                    {{$blogpost->links() }}
                    <!-- <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i></a>
                    <a href="#">01.</a>
                    <a href="#" class="current-page">02.</a>
                    <a href="#">03.</a>
                    <a href="#">04.</a>
                    <a href="#" class="nextposts-link"><i class="fas fa-caret-right"></i></a> -->
                </div>
                <!--pagination end-->
            </div>
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