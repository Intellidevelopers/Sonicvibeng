@extends('layout.admin-app')
@section('content')
<div class="app-content icon-content">
    <div class="section">
        <div class="page-header">
            <h4>{{$title}}</h4>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$title}}</h4>
                            <hr>
                            <form method="POST" action="{{route('update.change.password')}}">
                                @csrf
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control"
                                        placeholder="Enter Confirm Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary " name="submit">Change
                                        password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>





    </div><!-- End #main -->
</div>

@endsection