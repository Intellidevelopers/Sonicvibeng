@extends('layout.admin-app')
@section('content')
<div class="app-content icon-content">
    <div class="section">
        @include('layout.nav')

        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body row">
                            <div class="col-lg-6">
                                <h5 class="card-title">{{$title}}</h5>
                            </div>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($trending))
                                    <?php $sn = 1; ?>
                                    @foreach($trending as $trend)
                                    <tr>
                                        <th scope="row">{{$sn++}}</th>
                                        <td><img src="{{asset('upload/'.$trend->image)}}" style="height: 50px;">
                                        </td>
                                        <td>{{$trend->name}}</td>
                                        <td>
                                            @if($trend->status == "pending")
                                            <button class="btn btn-warning text-white">{{strtoupper($trend->status)}}</button>
                                            @else
                                            <button class="btn btn-success text-white">{{strtoupper($trend->status)}}</button>
                                            @endif
                                        </td>
                                        <td>{{$trend->created_at}}</td>
                                        <td>
                                            <a href="{{route('edit.post',$trend->id)}}" class="btn btn-primary text-white"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('delete.post',$trend->id)}}" class="btn btn-danger text-white"><i class="fa fa-trash"></i></a>
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
    </div><!-- End #main -->
</div>

@endsection