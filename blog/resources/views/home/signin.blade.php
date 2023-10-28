@extends('layout.reg-app')
@section('content')

<div class="col col-login mx-auto mt-6">
    <div class=" text-center">
        <img src="{{asset('upload/'.$settings->logo)}}" class="header-brand-img desktop-logo h-100 mb-5" alt="{{$settings->sitename}}">
        <img src="{{asset('upload/'.$settings->logo)}}" class="header-brand-img dark-theme h-100 mb-5 " alt="{{$settings->sitename}}">
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5  mx-auto ">
            <div class=" card">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12 pl-0 ">
                        <div class="card-body p-6 about-con pabout">
                            <div class="card-title text-center  mb-4">LOGIN</div>
                            @if(Session::has('error')=="error")
                            <div class="alert alert-dismised alert-danger" role="alert">
                                {{Session::get('error')}}
                            </div>
                            @elseif(Session::has('msg')=="msg")
                            <div class="alert alert-dismised alert-success" role="alert">
                                {{Session::get('msg')}}
                            </div>
                            @endif
                            <form action="{{route('signin.action')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="singin-email-2">Username or email address *</label>
                                    <input type="text" class="form-control" id="singin-email-2" name="name" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="singin-password-2">Password *</label>
                                    <input type="password" class="form-control" id="singin-password-2" name="password" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer mt-1">
                                    <button type="submit" class="btn btn-primary btn-block" name="role" value="admin">
                                        <span>LOG IN</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                    </div><!-- End .custom-checkbox -->

                                    <!-- <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <a href="{{route('password.recover')}}"
                                                class="float-right small text-info">Forgot
                                                password?</a>
                                        </label>
                                    </div> -->

                                </div><!-- End .form-footer -->

                            </form>
                            <!-- <div class="text-center fs-15 mt-3">
                                Don't have account yet? <a href="{{route('signup')}}" class="text-primary">Signup</a>
                            </div> -->
                            <hr class="divider">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>









@endsection