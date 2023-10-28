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
                            <form method="POST" action="{{route('update.contact')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8 col-9">
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{$contact->email}}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="form-group">
                                            <label>Email Status</label>
                                            <select name="estatus" class="form-control">
                                                @if($contact->estatus =="approved")
                                                <option value="{{$contact->estatus}}">{{$contact->estatus}}</option>
                                                <option value="pending">Pending</option>
                                                @else
                                                <option value="{{$contact->estatus}}">{{$contact->estatus}}</option>
                                                <option value="approved">Approved</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-9">
                                        <div class="form-group">
                                            <label>Phone Number </label>
                                            <input type="tel" name="phone" class="form-control"
                                                value="{{$contact->phone}}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="form-group">
                                            <label>Phone Number Status</label>
                                            <select name="pstatus" class="form-control">
                                                @if($contact->pstatus =="approved")
                                                <option value="{{$contact->pstatus}}">{{$contact->pstatus}}</option>
                                                <option value="pending">Pending</option>
                                                @else
                                                <option value="{{$contact->pstatus}}">{{$contact->pstatus}}</option>
                                                <option value="approved">Approved</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$contact->id}}" name="id">
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