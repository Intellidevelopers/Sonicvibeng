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
                            <form method="POST" action="{{route('update.category')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category name</label>
                                    <input type="text" name="cname" class="form-control" value="{{$category->name}}" />
                                    <input type="hidden" name="cid" class="form-control" value="{{$category->id}}" />
                                </div>
                                <div class="form-group">
                                    <label>Category Banner</label>

                                    <input type="file" name="image" class="form-control" />
                                    @if(!empty($category->banner))
                                    <img src="{{asset('upload/'.$category->banner)}}" alt="" class="img-fluid" style="height: 100px;">
                                    @endif
                                </div>
                                <div class="form-group mt-3">
                                    <label>Select Status</label>
                                    <select name="status" class="form-control">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                    </select>
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