@extends('layout.admin-app')
@section('content')
<div class="app-content icon-content">
    <div class="section">
        @include('layout.nav')
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-lg-6">
                                <h5 class="card-title">{{$title}}</h5>
                            </div>
                            <div class="col-lg-6 d-flex flex-row-reverse my-2">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#basicModal">
                                    Add Category
                                </button>
                            </div>
                            <hr>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($category))
                                    <?php $sn = 1; ?>
                                    @foreach($category as $cat)
                                    <tr>
                                        <th scope="row">{{$sn++}}</th>
                                        <td>{{$cat->name}}</td>
                                        <td>@if($cat->status == "approved")
                                            <button class="btn btn-success">
                                                {{$cat->status}}
                                            </button>
                                            @else
                                            <button class="btn btn-warning text-white">
                                                {{$cat->status}}
                                            </button>
                                            @endif

                                        </td>
                                        <td>{{$cat->created_at}}</td>
                                        <td>
                                            <a href="{{route('edit.category',$cat->id)}}"
                                                class="btn  btn-primary text-white"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('delete.category',$cat->id)}}"
                                                class="btn btn-danger text-white"><i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5">No Data </td>
                                    </tr>
                                    @endif


                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            aria-label="Close">close</button>
                    </div>
                    <form method="POST" action="{{route('submit.category')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" name="cname" class="form-control" placeholder="Category name" />
                            </div>
                            <div class="form-group">
                                <label>Category Banner</label>
                                <input type="file" name="image" class="form-control" />
                            </div>
                            <div class="form-group mt-3">
                                <label>Select Status</label>
                                <select name="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary " name="submit" data-url="">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- End Basic Modal-->


    </div><!-- End #main -->
</div>

@endsection