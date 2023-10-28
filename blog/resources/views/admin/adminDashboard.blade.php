@extends('layout.admin-app')
@section('content')
<!-- App-content opened -->
<div class="app-content icon-content">
    <div class="section">

        <!-- Page-header opened -->
        <div class="page-header">


        </div>
        <!-- Page-header closed -->

        <!-- Banner opened -->
        <div class="row">
            <div class="col-xl-12">
                <div class="banner banner-color mt-0">
                    <div class="col-xl-2 col-lg-3 col-md-12">
                        <img src="../assets/images/svg/new_message.svg" alt="image" class="image">
                    </div>
                    <div class="page-content col-xl-7 col-lg-6 col-md-12">
                        <h3 class="mb-1">Welcome back! {{$user->username}}</h3>
                        <p class="mb-0 fs-16">We are here to grow your capital</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 text-right d-flex d-block">
                        <a href="{{route('add.post')}}" class="btn btn-success mr-3">Add Post</a>
                        <a href="{{route('category')}}" class="btn btn-primary">Add Category</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner opened -->

        <!-- row opened -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="">
                                <p class="mb-2 h6">Active Post</p>
                                <h2 class="mb-1 ">{{$totalPost}}</h2>
                                <p class="mb-0 text-muted"><span class="text-success">(+0.35%)<i
                                            class="fe fe-arrow-up text-success"></i></span>Increase</p>
                            </div>
                            <div class=" my-auto ml-auto">
                                <div class="chart-wrapper text-center">
                                    <canvas id="areaChart1"
                                        class="areaChart2 chartjs-render-monitor chart-dropshadow-primary overflow-hidden mx-auto"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="">
                                <p class="mb-2 h6">Total Advertisement</p>
                                <h2 class="mb-1 ">{{$totaladvert}}</h2>
                                <p class="mb-0 text-muted"><span class="text-danger">(+0.54%)</span><i
                                        class="fe fe-arrow-down text-danger"></i>Decrease</p>
                            </div>
                            <div class=" my-auto ml-auto">
                                <div class="chart-wrapper">
                                    <canvas id="areaChart2"
                                        class="areaChart2 chartjs-render-monitor chart-dropshadow-secondary overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="">
                                <p class="mb-2 h6">Total Contact</p>
                                <h2 class="mb-1 ">{{$totalcontact}}</h2>
                                <p class="mb-0 text-muted"><span class="text-success">(+0.96%)<i
                                            class="fe fe-arrow-up text-success"></i></span>Increase</p>
                            </div>
                            <div class="my-auto ml-auto">
                                <div class="chart-wrapper">
                                    <canvas id="areaChart3"
                                        class="areaChart3 chartjs-render-monitor chart-dropshadow-info overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="">
                                <p class="mb-2 h6">Total Category</p>
                                <h2 class="mb-1 ">{{$totalcategory}}</h2>
                                <p class="mb-0 text-muted"><span class="text-danger">(+0.42%)</span><i
                                        class="fe fe-arrow-down text-danger"></i>Decrease</p>
                            </div>
                            <div class="my-auto ml-auto">
                                <div class="chart-wrapper">
                                    <canvas id="areaChart4"
                                        class="areaChart4 chartjs-render-monitor chart-dropshadow-success overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->


    </div>
</div>
<!-- App-content closed -->
@endsection