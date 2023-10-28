 <!-- main start  -->
 <div id="main">
     <!-- progress-bar  -->
     <div class="progress-bar-wrap">
         <div class="progress-bar color-bg"></div>
     </div>
     <!-- progress-bar end -->
     <!-- header -->
     <header class="main-header">
         <!-- top bar -->
         <div class="top-bar fl-wrap">
             <div class="container">
                 <div class="date-holder">
                     <span class="date_num"></span>
                     <span class="date_mounth"></span>
                     <span class="date_year"></span>
                 </div>
                 <div class="header_news-ticker-wrap">
                     <div class="hnt_title">Hot News :</div>
                     <div class="header_news-ticker fl-wrap">
                         <ul>
                             @if(!empty($blogpost))
                             @foreach($blogpost as $post)
                             <li><a href="{{route('post',$post->slug)}}">{{$post->name}}</a></li>
                             @endforeach
                             @endif
                         </ul>
                     </div>
                     <div class="n_contr-wrap">
                         <div class="n_contr p_btn"><i class="fas fa-caret-left"></i></div>
                         <div class="n_contr n_btn"><i class="fas fa-caret-right"></i></div>
                     </div>
                 </div>
                 <ul class="topbar-social">
                     <li><a href="https://facebook.com/jossyblog/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                     </li>
                     <li><a href="https://twitter.com/jossyblog/" target="_blank"><i class="fab fa-twitter"></i></a>
                     </li>
                     <li><a href="https://instagram.com/jossy1blog/" target="_blank"><i
                                 class="fab fa-instagram"></i></a></li>
                     <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                     <li><a href="https://pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                     <li><a href="https://youtube.com/jossyblog" target="_blank"><i class="fab fa-youtube"></i></a>
                     </li>
                 </ul>
             </div>
         </div>
         <!-- top bar end -->
         <div class="header-inner fl-wrap">
             <div class="container">
                 <!-- logo holder  -->
                 <a href="{{route('home')}}" class="logo-holder"><img src="{{asset('upload/'.$settings->logo)}}"></a>
                 <!-- logo holder end -->
                 <div class="search_btn htact show_search-btn"><i class="far fa-search"></i> <span
                         class="header-tooltip">Search</span></div>
                 <!-- header-search-wrap -->
                 <div class="header-search-wrap novis_sarch">
                     <div class="widget-inner">
                         <form action="{{route('search.action')}}" method="post">
                             @csrf
                             <input name="word" id="search-input" type="text" class="search" placeholder="Search..." />
                             <button type="submit" class="search-submit" id="search-button">Search</button>
                         </form>

                     </div>
                     <div id="news-results"></div>
                 </div>
                 <!-- header-search-wrap end -->
                 <!-- nav-button-wrap-->
                 <div class="nav-button-wrap">
                     <div class="nav-button">
                         <span></span><span></span><span></span>
                     </div>
                 </div>
                 <!-- nav-button-wrap end-->
                 <!--  navigation -->
                 <div class="nav-holder main-menu">
                     <nav>
                         <ul>
                             <li>
                                 <a href="{{route('home')}}" class="act-link">Home</a>
                                 <!-- <a href="#" class="act-link">Search News</a> -->
                                 <!--second level -->
                                 <!--second level end-->
                             </li>
                             <li>
                                 <a href="#">Posts<i class="fas fa-caret-down"></i></a>
                                 <!--second level -->
                                 <ul>
                                     <li><a href="{{route('recent.post')}}">MOST RECENT</a></li>
                                     <li><a href="#">BLOG CATEGORY</a></li>
                                     <li>
                                         <a href="#">PUBLIC</a>
                                         <!--second level -->
                                         <!--second level end-->
                                     </li>
                                 </ul>
                                 <!--second level end-->
                             </li>
                             @if(!empty($category))
                             @foreach($category as $cat)
                             <li><a href="{{url('home/'.$cat->slug)}}">{{$cat->name}}</a></li>
                             @endforeach
                             @endif
                             <li>
                                 <a href="#">MORE<i class="fas fa-caret-down"></i></a>

                                 <!--second level -->
                                 <ul>
                                     <li><a href="{{route('about')}}">About</a></li>
                                     <li><a href="{{route('contact')}}">Contacts</a></li>
                                     <li><a href="#">Category</a></li>

                                 </ul>
                                 <!--second level end-->
                             </li>
                         </ul>
                     </nav>
                 </div>
                 <!-- navigation  end -->
             </div>
         </div>
     </header>
     <!-- header end  -->
     <!-- wrapper -->
     <div id="wrapper">