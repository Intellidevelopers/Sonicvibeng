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
                            <form method="POST" action="{{route('update.quote')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Quote</label>
                                    <textarea name="name" id="" cols="30" rows="6" class="form-control"
                                        placeholder="Enter Quote">{{$quote->name}}</textarea>
                                </div>
                                <input type="hidden" name="id" value="{{$quote->id}}">
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