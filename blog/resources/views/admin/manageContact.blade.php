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

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Email Status</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Phone Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($contact))
                                    <?php $sn = 1; ?>
                                    @foreach($contact as $cat)
                                    <tr>
                                        <th scope="row">{{$sn++}}</th>
                                        <td>{{$cat->email}}</td>
                                        <td>
                                            @if($cat->estatus == "approved")
                                            <button class="btn btn-success">
                                                {{$cat->estatus}}
                                            </button>
                                            @else
                                            <button class="btn btn-warning text-white">
                                                {{$cat->estatus}}
                                            </button>
                                            @endif

                                        </td>
                                        <td>{{$cat->phone}}</td>
                                        <td>
                                            @if($cat->pstatus == "approved")
                                            <button class="btn btn-success">
                                                {{$cat->pstatus}}
                                            </button>
                                            @else
                                            <button class="btn btn-warning text-white">
                                                {{$cat->pstatus}}
                                            </button>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{route('edit.contact',$cat->id)}}"
                                                class="btn  btn-primary text-white"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('delete.contact',$cat->id)}}"
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


    </div><!-- End #main -->
</div>

@endsection