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
                                        <th scope="col">Quote</th>
                                        <th scope="col">Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($quote))
                                    <?php $sn = 1; ?>
                                    @foreach($quote as $cat)
                                    <tr>
                                        <th scope="row">{{$sn++}}</th>
                                        <td>{{$cat->name}}</td>

                                        <td>{{$cat->created_at}}</td>
                                        <td>
                                            <a href="{{route('edit.quote',$cat->id)}}"
                                                class="btn  btn-primary text-white"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('delete.quote',$cat->id)}}"
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
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Add Quote</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            aria-label="Close">close</button>
                    </div>
                    <form method="POST" action="{{route('submit.quote')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Quote</label>
                                <textarea name="name" id="" cols="30" rows="6" class="form-control"
                                    placeholder="Enter Quote"></textarea>

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