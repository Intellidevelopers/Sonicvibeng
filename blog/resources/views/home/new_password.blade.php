@extends('layout.reg-app')
@section('content')
<main class="main">

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
        style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                aria-controls="signin-2" aria-selected="true">{{$title}}</a>
                        </li>

                    </ul>
                    <div class="tab-content my-4">
                        @if(Session::has('error')=="error")
                        <div class="alert alert-dismised alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                        @elseif(Session::has('msg')=="msg")
                        <div class="alert alert-dismised alert-success" role="alert">
                            {{Session::get('msg')}}
                        </div>
                        @endif
                        <!-- <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="register-tab-2"> -->
                        <form action="{{route('updatepassword.action')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="singin-email-2">Password *</label>
                                <input type="password" class="form-control" name="password" required>
                            </div><!-- End .form-group -->
                            <div class="form-group">
                                <label for="singin-email-2">Confirm Password *</label>
                                <input type="password" class="form-control" name="cpassword" required>
                            </div><!-- End .form-group -->
                            <input type="text" class="form-control" name="email" value="{{$email}}" hidden>

                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2" name="role" value="user">
                                    <span>New Password</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </div><!-- End .form-footer -->
                            <div>
                                <p><a href="{{route('signin')}}">Click to Sign in</a> </p>
                            </div>
                        </form>

                        <!-- </div> -->
                        <!-- .End .tab-pane -->

                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->

@endsection