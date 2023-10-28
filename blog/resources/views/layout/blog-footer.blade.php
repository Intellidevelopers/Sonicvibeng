 <footer class="fl-wrap main-footer">
     <div class="container">
         <!-- footer-widget-wrap -->
         <div class="footer-widget-wrap fl-wrap">
             <div class="row">
                 <!-- footer-widget -->
                 <div class="col-md-4">
                     <div class="footer-widget">
                         <div class="footer-widget-content">
                             <a href="index.html" class="footer-logo">
                                 <b>
                                     <h1 style="color: white; font-weight: 700;font-size: 20px;">JOSSYBLOG
                                     </h1>
                                 </b>
                             </a>
                             <p>We appreciate your engagement and look forward to hearing from you soon...
                             </p>
                             <div class="footer-social fl-wrap">
                                 <ul>
                                     <li><a href="https://facebook.com/jossyblog/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                     <li><a href="https://twitter.com/jossyblog/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                     <li><a href="https://instagram.com/jossy1blog/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                     <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                     <li><a href="https://pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                                     <li><a href="https://youtube.com/jossyblog" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- footer-widget  end-->
                 <!-- footer-widget -->
                 <div class="col-md-2">
                     <div class="footer-widget">
                         <div class="footer-widget-title">Categories </div>
                         <div class="footer-widget-content">
                             <div class="footer-list footer-box fl-wrap">
                                 <ul>
                                     @if(!empty($category))
                                     @foreach($category as $cat)
                                     <li> <a href="{{url('home/'.$cat->slug)}}">{{$cat->name}}</a></li>
                                     @endforeach
                                     @endif
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- footer-widget  end-->
                 <!-- footer-widget -->
                 <div class="col-md-2">
                     <div class="footer-widget">
                         <div class="footer-widget-title">Links</div>
                         <div class="footer-widget-content">
                             <div class="footer-list footer-box fl-wrap">
                                 <ul>
                                     <li> <a href="{{route('home')}}">Home</a></li>
                                     <li> <a href="{{route('about')}}">About</a></li>
                                     <li> <a href="{{route('contact')}}">Contact Us</a></li>
                                     <!-- <li> <a href="blog.html">News</a></li> -->
                                     <li> <a href="mailto:adverts@jossyblog.com">Contact us for Advert</a>
                                     </li>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- footer-widget  end-->

                 <!-- footer-widget -->
                 <div class="col-md-2">
                     <div class="footer-widget">
                         <div class="footer-widget-title">Contact us for your Advert</div>
                         <div class="footer-widget-content">
                             <div class="footer-list footer-box fl-wrap">
                                 <ul>
                                     <li><a href="mailto:adverts@jossyblog.com">adverts@jossyblog.com</a>
                                     </li>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- footer-widget  end-->

                 <!-- footer-widget -->
                 <div class="col-md-4">
                     <div class="footer-widget">
                         <div class="footer-widget-title">Subscribe</div>
                         <div class="footer-widget-content">
                             <div class="subcribe-form fl-wrap">
                                 <p>{{$settings->footer}}</p>
                                 <form id="subscribe" class="fl-wrap" action="https://formspree.io/f/xbjelena/" method="post">
                                     <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                                     <button type="submit" id="subscribe-button" class="subscribe-button color-bg">Send
                                     </button>
                                     <label for="subscribe-email" class="subscribe-message"></label>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- footer-widget  end-->
             </div>
         </div>
         <!-- footer-widget-wrap end-->
     </div>
     <div class="footer-bottom fl-wrap">
         <div class="container">
             <div class="copyright"><span>&#169; {{$settings->copyright}}</span> . All rights reserved. </div>
             <div class="to-top"> <i class="fas fa-caret-up"></i></div>
             <div class="subfooter-nav">
                 <ul>
                     <li><a href="terms.html">Terms & Conditions</a></li>
                     <li><a href="terms.html">Privacy Policy</a></li>
                 </ul>
             </div>
         </div>
     </div>
 </footer>
 <!-- footer end-->
 <div class="aside-panel">
     <ul>
         @if(!empty($category))
         @foreach($category as $cat)
         <li> <a href="{{url('home/'.$cat->slug)}}"><i class="far fa-atom"></i><span>{{$cat->name}}</span></a></li>
         @endforeach
         @endif
         <!-- <li> <a href="blog.html"><i class="far fa-atom"></i><span>Technology</span></a></li>
         <li> <a href="blog.html"><i class="far fa-user-chart"></i><span>Business</span></a></li>
         <li> <a href="blog.html"><i class="far fa-tennis-ball"></i><span>Sports</span></a></li>
         <li> <a href="blog.html"><i class="far fa-flask"></i><span>Science</span></a></li> -->
     </ul>
 </div>
 </div>