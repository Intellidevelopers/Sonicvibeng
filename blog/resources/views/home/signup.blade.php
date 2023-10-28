@extends('layout.reg-app')
@section('content')

<div class="col col-login mx-auto mt-6">
    <div class=" text-center">
        <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo h-100 mb-5"
            alt="Dashlot logo">
        <img src="{{asset('assets/images/brand/logo1.png')}}" class="header-brand-img dark-theme h-100 mb-5 "
            alt="Dashlot logo">
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5  mx-auto ">
            <div class=" card">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12 pl-0 ">
                        <div class="card-body p-6 about-con pabout">
                            <div class="card-title text-center  mb-4">Sign up</div>
                            @if(Session::has('error')=="error")
                            <div class="alert alert-dismised alert-danger" role="alert">
                                {{Session::get('error')}}
                            </div>
                            @elseif(Session::has('msg')=="msg")
                            <div class="alert alert-dismised alert-success" role="alert">
                                {{Session::get('msg')}}
                            </div>
                            @endif
                            <form action="{{route('signup.action')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Fullname">Full name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="fullname" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="Username">Username<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-email-2">Your email address <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required>
                                </div><!-- End .form-group -->
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="col-md-12 col-form-label">Phone number</label>
                                            <input id="phone" name="phone" type="tel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" class="col-md-12 col-form-label">Sex</label>
                                            <select name="sex" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="register-password-2">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="Confirmpassword-2">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="cpassword" required>
                                </div><!-- End .form-group -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                    <label class="custom-control-label" for="register-policy-2">I agree to the <a
                                            href="#">privacy
                                            policy</a> *</label>
                                </div><!-- End .custom-checkbox -->
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>

                            <div class="text-center fs-15 mt-3">
                                Don't have account yet? <a href="{{route('signin')}}" class="text-primary">Signin</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>









@endsection