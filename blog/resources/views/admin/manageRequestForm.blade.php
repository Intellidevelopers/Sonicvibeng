@extends('layout.admin-app')
@section('content')
@php
use Illuminate\Support\Str;
@endphp
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
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Email </th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($contacts))
                                    <?php $sn = 1; ?>
                                    @foreach($contacts as $cat)
                                    <tr>
                                        <th scope="row">{{$sn++}}</th>
                                        <td>{{$cat->name}}</td>
                                        <td>{{$cat->email}}</td>
                                        <td>
                                            @if($cat->status == "Read")
                                            <button class="btn btn-success">
                                                {{$cat->status}}
                                            </button>
                                            @else
                                            <button class="btn btn-warning text-white">
                                                {{$cat->status}}
                                            </button>
                                            @endif

                                        </td>
                                        <td>{{ Str::limit($cat->message, 100) }}</td>
                                        <td>
                                            <a href="{{route('view.request.form',$cat->id)}}"
                                                class="btn  btn-primary text-white"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('delete.request.form',$cat->id)}}"
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