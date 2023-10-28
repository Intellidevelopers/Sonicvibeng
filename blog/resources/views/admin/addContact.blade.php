@extends('layout.admin-app')
@section('content')
<div class="app-content icon-content">
    <div class="section">
        @include('layout.nav')
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$title}}</h4>
                            <hr>
                            <form method="POST" action="{{route('submit.contact')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8 col-9">
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter Email address" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="form-group">
                                            <label>Email Status</label>
                                            <select name="estatus" class="form-control">
                                                <option value="pending">Pending</option>
                                                <option value="approved">Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-9">
                                        <div class="form-group">
                                            <label>Phone Number </label>
                                            <input type="tel" name="phone" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="form-group">
                                            <label>Phone Number Status</label>
                                            <select name="pstatus" class="form-control">
                                                <option value="pending">Pending</option>
                                                <option value="approved">Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary " name="submit">Update</button>
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