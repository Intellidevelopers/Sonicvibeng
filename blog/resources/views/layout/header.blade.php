<!-- Top-header opened -->
<div class="header-main header sticky">
    <div class="app-header header top-header navbar-collapse ">
        <div class="container-fluid">
            <div class="d-flex">
                <a class="header-brand" href="index.html">
                    <img src="{{asset('upload/'.$settings->logo)}}" class="header-brand-img desktop-logo " alt="Dashlot logo">
                    <img src="{{asset('upload/'.$settings->logo)}}" class="header-brand-img desktop-logo-1 " alt="Dashlot logo">
                    <img src="{{asset('upload/'.$settings->logo)}}" class="mobile-logo" alt="Dashlot logo">
                    <img src="{{asset('upload/'.$settings->logo)}}" class="mobile-logo-1" alt="Dashlot logo">
                </a>
                <a href="#" data-toggle="sidebar" class="nav-link icon toggle"><i class="fe fe-align-justify fs-20"></i></a>
                <div class="d-flex header-left left-header">
                    <div class="d-none d-lg-block horizontal">
                        <ul class="nav">
                            <li class="">
                                <div class="dropdown d-none d-md-flex">
                                    <a href="#" class="d-flex nav-link pr-0  pt-2 mt-3 country-flag1" data-toggle="dropdown">
                                        <span class="d-flex"><img src="../assets/images/us_flag.jpg" alt="img" class="avatar country-Flag mr-2 align-self-center"></span>
                                        <div>
                                            <span class="d-flex fs-14 mr-3 mt-0">English<span><i class="mdi mdi-chevron-down"></i></span></span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                        <a href="#" class="dropdown-item d-flex align-items-center mt-2">
                                            <img src="../assets/images/french_flag.jpg" alt="flag-img" class="w-6 flag-sm mr-3 align-self-center">
                                            <div>
                                                <span>French</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex align-items-center">
                                            <img src="../assets/images/germany_flag.jpg" alt="flag-img" class="w-6 flag-sm mr-3 align-self-center">
                                            <div>
                                                <span>Germany</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex align-items-center">
                                            <img src="../assets/images/italy_flag.jpg" alt="flag-img" class="w-6 flag-sm  mr-3 align-self-center">
                                            <div>
                                                <span>Italy</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex align-items-center">
                                            <img src="../assets/images/russia_flag.jpg" alt="flag-img" class="w-6 flag-sm mr-3 align-self-center">
                                            <div>
                                                <span>Russia</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex align-items-center mb-2">
                                            <img src="../assets/images/spain_flag.jpg" alt="flag-img" class="w-6 flag-sm mr-3 align-self-center">
                                            <div>
                                                <span>Spain</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex header-right ml-auto">
                    <div class="dropdown header-fullscreen">
                        <a class="nav-link icon full-screen-link" id="fullscreen-button">
                            <i class="mdi mdi-arrow-collapse fs-20"></i>
                        </a>
                    </div><!-- Fullscreen -->
                    <div class="" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form" role="search">
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button type="reset" class="btn btn-default">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div><!-- Search -->
                    <div class="dropdown header-notify">
                        <a class="nav-link icon text-center" data-toggle="dropdown">
                            <i class="typcn typcn-bell bell-animations"></i>
                            <span class="pulse bg-success"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated bounceInDown dropdown-menu-arrow w-250">
                            <div class="dropdown-header p-4 mb-2 bg-header-image p-5 text-white">
                                <h5 class="dropdown-title mb-1 font-weight-semibold text-drak">Notifications
                                </h5>
                                <p class="dropdown-title-text subtext mb-0 pb-0 fs-13">You have 4 new
                                    notifications</p>
                            </div>
                            <div class="drop-notify">
                                @if(!empty($requestcontacts))
                                @foreach($requestcontacts as $post)
                                <a href="#" class="dropdown-item d-flex pb-3 pl-4 pr-2 border-bottom">
                                    <div class="notifyimg bg-info-transparent text-info-shadow"><i class="fa fa-envelope-o fs-18 text-info"></i></div>
                                    <div><strong> 3 new Comments</strong>
                                        <div class="small fs-14 text-muted">{{$post->created_at}}</div>
                                    </div>
                                </a>
                                @endforeach
                                @endif
                            </div>
                            <div class="dropdown-divider mb-0"></div>
                            <a href="#" class="dropdown-item text-center br-br-6 br-bl-6">See all
                                Messages</a>
                        </div>
                    </div><!-- Notification -->
                    <div class="dropdown d-md-flex message">
                        <a class="nav-link icon" data-toggle="dropdown">
                            <i class="typcn typcn-messages"></i>
                            <span class="badge badge-secondary pulse-secondary">{{$tcontact}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated bounceInDown dropdown-menu-arrow">
                            <div class="dropdown-header bg-header-image text-white w-300 p-5 mb-2">
                                <h5 class="dropdown-title mb-1 font-weight-semibold text-drak">Contact Messages</h5>
                                <p class="dropdown-title-text subtext mb-0 pb-0 fs-13 "></p>
                            </div>
                            <div class="drop-scroll">
                                @if(!empty($requestcontacts))
                                @foreach($requestcontacts as $post)
                                <a href="{{route('view.request.form',$post->id)}}" class="p-3 d-flex border-bottom">
                                    <div class="avatar avatar-md  mr-3 d-block cover-image brround default-shadow" data-image-src="../assets/images/users/6.jpg">
                                        <span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="w-80">
                                        <div class="d-flex">
                                            <h5 class="mb-2">{{$post->name}}</h5>
                                            <i class="fa fa-circle-thin text-right ml-auto fs-10 text-success float-right"></i>
                                        </div>
                                        <p class="mb-1">{{ Str::limit(strip_tags($post->message), 150, '...') }}</p>
                                        <span class="font-weight-normal fs-13 text-muted">{{$post->created_at}}</span>
                                    </div>
                                </a>
                                @endforeach
                                @endif

                            </div>
                            <div class="dropdown-divider mb-0 mt-0"></div>
                            <a href="{{route('manage.contact.request')}}" class="dropdown-item text-center p-3">See all Messages</a>
                        </div>
                    </div><!-- Message-box -->
                    <div class="dropdown d-md-flex d-cart">
                        <a class="nav-link icon" data-toggle="dropdown">
                            <i class="typcn typcn-bell bell-animations"></i>
                            <span class="badge badge-danger pulse-danger">{{$totalcomment}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated bounceInDown dropdown-menu-arrow">
                            <div class="dropdown-header bg-header-image text-white w-300 p-5 mb-2">
                                <h5 class="dropdown-title mb-1 font-weight-semibold text-drak">Comment Message</h5>
                                <p class="dropdown-title-text subtext mb-0 pb-0 fs-13 ">You have {{$totalcomment}} comments</p>
                            </div>
                            <div class="drop-cart">
                                @if(!empty($comments))
                                @foreach($comments as $post)
                                <div class="border-bottom">
                                    <div class="d-flex pl-3 pr-4 pt-2 pb-3 cart align-items-center">
                                        <div class="text-warning drop-cart-img">
                                            <img src="../assets/images/media/ecommerce/2.png" class="" alt="Smart Watch">
                                        </div>
                                        <div class="flex dropdown-cart">
                                            <div class="d-flex align-items-center">
                                                <div class="pl-3">
                                                    <span class="fs-16 font-weight-semibold d-block">{{$post->blog->name}}</span>
                                                    <div class="para fs-14 text-muted">{{$post->message}}</div>
                                                </div>
                                                <div class="pl-8 ml-auto">
                                                    <a href="{{route('delete.comment',$post->id)}}" class="text-nowrap text-danger"><i class="fa fa-trash fs-16"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                            <div class="dropdown-divider mb-0 mt-0"></div>
                            <a href="#" class="dropdown-item text-center p-3">See all Items</a>
                        </div>
                    </div><!-- Cart -->
                    <div class="dropdown drop-profile">
                        <a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile-details mt-1">
                                <span class="mr-3 mb-0  fs-15 font-weight-semibold">{{$user->fullname}}</span>
                                <small class="text-muted mr-3">Admin</small>
                            </div>
                            <img class="avatar avatar-md brround" src="../assets/images/users/2.jpg" alt="image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated bounceInDown w-250">
                            <div class="user-profile bg-header-image border-bottom p-3">
                                <div class="user-image text-center">
                                    <img class="user-images" src="../assets/images/users/2.jpg" alt="image">
                                </div>
                                <div class="user-details text-center">
                                    <h4 class="mb-0">{{$user->fullname}}</h4>
                                    <p class="mb-1 fs-13 text-white-50">{{$user->email}}</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon mdi mdi-account-outline "></i> Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon  mdi mdi-settings"></i> Settings
                            </a>

                            
                            <a href="{{ route('logout') }}" class="dropdown-item mb-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div><!-- Profile -->
                    <div class="sidebar-link">
                        <a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                            <i class="fe fe-align-right"></i>
                        </a>
                    </div><!-- Right-side-toggle -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top-header closed -->