@extends('layout.blog-app')
@section('content')
<!-- content    -->
<div class="content">
    <!--section   -->
    <section class="hero-section">
        <div class="bg-wrap hero-section_bg">
            <div class="bg" data-bg="{{asset('home_assets/images/bg/8.jpg')}}"></div>
        </div>
        <div class="container">
            <div class="hero-section_title">
                <h2>Our Conatcts</h2>
            </div>
            <div class="clearfix"></div>
            <div class="breadcrumbs-list fl-wrap">
                <a href="{{route('home')}}">Home</a> <a href="#">Pages</a> <span>{{$title}}</span>
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
                    <div class="pr-subtitle prs_big">Details</div>
                    <!--card-item -->
                    <ul class="contacts-list fl-wrap">
                        <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a
                                href="#">{{$settings->address}}</a></li>
                        <li><span><i class="fal fa-phone"></i> Phone :</span>
                            @if(!empty($contacts))
                            @foreach($contacts as $contact)
                            <a href="tel:{{$contact->phone}}">{{$contact->phone}},</a>
                            @endforeach
                            @endif
                        </li>
                        <li><span><i class="fal fa-envelope"></i> Mail :</span>
                            @if(!empty($emails))
                            @foreach($emails as $contact)
                            <a href="mailto:{{$contact->email}}">{{$contact->email}},</a>
                            @endforeach
                            @endif
                        </li>
                    </ul>
                    <!--card-item end -->
                    <div class="contact-social fl-wrap">
                        <span class="cs-title">Find us on: </span>
                        <ul>
                            <li><a href="https://facebook.com/jossyblog/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/jossyblog/" target="_blank"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a href="https://instagram.com/jossy1blog/" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                            <li><a href="https://pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li><a href="https://youtube.com/jossyblog" target="_blank"><i
                                        class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <!-- box-widget -->
                    <div class="box-widget-content fl-wrap">
                        <div class="banner-widget fl-wrap">
                            <div class="bg-wrap bg-parallax-wrap-gradien">
                                <div class="bg  " data-bg="{{asset('home_assets/images/bg/6.jpg')}}"></div>
                            </div>
                        </div>
                    </div>
                    <!-- box-widget  end -->
                </div>
                <div class="col-md-8">
                    <div class="pad-con fl-wrap">
                        <div class="pr-subtitle prs_big">Drop us a line</div>
                        <p>{!!$settings->about!!}</p>
                        <div id="contact-form" style="margin-top: 20px;">
                            <div id="message"></div>
                            <form class="custom-form" action="{{route('contact.action')}}" method="post">
                                @csrf
                                <fieldset>
                                    <input type="text" name="name" id="name" placeholder="Your Name *" value="" />
                                    <input type="text" name="email" id="email" placeholder="Email Address*" value="" />
                                    <textarea name="message" id="comments" cols="40" rows="3"
                                        placeholder="Your Message:"></textarea>
                                </fieldset>
                                <button class="btn   color-bg float-btn" type="submit">Send message <i
                                        class="fas fa-caret-right"></i></button>
                            </form>
                        </div>
                        <!-- contact form  end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- content  end-->
@endsection