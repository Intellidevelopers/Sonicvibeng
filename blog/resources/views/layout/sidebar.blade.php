 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar toggle-sidebar">
     <div class="app-sidebar__user">
         <div class="user-body">
             <img src="{{asset('assets/images/users/2.jpg')}}" alt="profile-img" class="rounded-circle w-25">
         </div>
         <div class="user-info">
             <a href="#" class=""><span class="app-sidebar__user-name font-weight-semibold">
                     {{$user->fullname}}</span><br>
                 <span class=" text-muted app-sidebar__user-designation text-sm">{{$user->package}}</span>
             </a>
         </div>
     </div>
     <ul class="side-menu toggle-menu">
         <li class="slide">
             <a class="side-menu__item" href="{{route('admin.dashboard')}}"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/homepage.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Dashboard</span></a>
         </li>
         <li class="slide">
             <a class="side-menu__item" data-toggle="slide" href="#"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/bitcoin-logo.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Category</span><i
                     class="angle fa fa-angle-right"></i></a>
             <ul class="slide-menu">
                 <li><a href="{{route('category')}}" class="slide-item">Add Category</a></li>
             </ul>
         </li>
         <li class="slide">
             <a class="side-menu__item" data-toggle="slide" href="#"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/testing.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Post</span><i
                     class="angle fa fa-angle-right"></i></a>
             <ul class="slide-menu">
                 <li><a href="{{route('add.post')}}" class="slide-item">Add Post</a>
                 </li>
                 <li><a href="{{route('manage.post')}}" class="slide-item">Manage Post</a></li>
                 <li><a href="{{route('pending.post')}}" class="slide-item">Pending Post</a></li>
             </ul>
         </li>
         <li class="slide">
             <a class="side-menu__item" data-toggle="slide" href="#"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/shopping-cart.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Advertisement</span><i
                     class="angle fa fa-angle-right"></i></a>
             <ul class="slide-menu">
                 <li><a href="{{route('add.advert')}}" class="slide-item">Add Advertisement</a></li>
                 <li><a href="{{route('manage.advert')}}" class="slide-item">Manage Advert</a></li>
             </ul>
         </li>
         <!-- <li class="slide">
             <a class="side-menu__item" data-toggle="slide" href="#"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/search.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Social Media</span><i
                     class="angle fa fa-angle-right"></i></a>
             <ul class="slide-menu">
                 <li><a href="alert.html" class="slide-item"> Add Social Media</a></li>
                 <li><a href="buttons.html" class="slide-item">Manage Social Media</a></li>
             </ul>
         </li> -->
         <li class="slide">
             <a class="side-menu__item" data-toggle="slide" href="#"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/writing.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Our Contact</span><i
                     class="angle fa fa-angle-right"></i></a>
             <ul class="slide-menu">
                 <li><a href="{{route('add.contact')}}" class="slide-item">Add Contact</a>
                 </li>
                 <li><a href="{{route('manage.contact')}}" class="slide-item">Manage Contact</a></li>
             </ul>
         </li>

         <li class="slide">
             <a class="side-menu__item" data-toggle="slide" href="#"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/layers.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Request Page</span><i
                     class="angle fa fa-angle-right"></i></a>
             <ul class="slide-menu">
                 <li><a href="{{route('manage.contact.request')}}" class="slide-item">Manage request</a></li>
             </ul>
         </li>
         <li class="slide">
             <a class="side-menu__item" href="{{route('quote')}}"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/email.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Quote</span></a>

         </li>
         <li class="slide">
             <a class="side-menu__item" data-toggle="slide" href="#"><span class="icon-menu-img"><img
                         src="{{asset('assets/images/svgs/bars-graphic.svg')}}" class="side_menu_img svg-1"
                         alt="image"></span><span class="side-menu__label">Settings</span><i
                     class="angle fa fa-angle-right"></i></a>
             <ul class="slide-menu">
                 <li><a href="{{route('settings')}}" class="slide-item">Settings</a>
                 </li>

                 <li><a href="{{route('changepassword')}}" class="slide-item">Change Password</a>
                 </li>

             </ul>
         </li>
         <li class="slide">
             <a href="{{ route('logout') }}" class="side-menu__item"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                 <span class="icon-menu-img"><img src="{{asset('assets/images/svgs/email.svg')}}"
                         class="side_menu_img svg-1" alt="image"></span><span class="side-menu__label">Logout</span>
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>

         </li>

     </ul>
 </aside>
 <!-- Sidemenu closed -->