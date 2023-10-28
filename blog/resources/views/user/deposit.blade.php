@extends('layout.user-app')
@section('content')
<!-- App-content opened -->
<div class="app-content icon-content">
    <div class="section">

        <!-- Page-header opened -->
        <div class="page-header">
        </div>
        <!-- Page-header closed -->


        <!-- row open -->
        <div class="row">
            @if(!empty($packages))
            @foreach($packages as $pack)
            <div class="col-lg-6 col-xl-4 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="">
                        <div class="ribbon-mode4l  bg-light" style="height: 100px ;">
                            <span class="ribbon3 text-white">{{$pack->title}}</span>
                        </div>

                        <div class="mt-3">
                            <div class="row pt-2 pb-2 pl-5 pr-5 mt-0 ">
                                <div class="col">
                                    <span class="mb-0 mt-1 fs-15">Duration</span>
                                </div>
                                <div class="col col-auto text-muted fs-15">{{$pack->duration}} days</div>
                            </div>

                            <div class="row pt-2 pb-2 pl-5 pr-5">
                                <div class="col">
                                    <span class="mb-0 mt-1 fs-15">Percent:</span>
                                </div>
                                <div class="col col-auto text-muted fs-15">{{$pack->percent}}%</div>
                            </div>
                            <div class="row pt-2 pb-2 pl-5 pr-5">
                                <div class="col">
                                    <span class="mb-0 mt-1 fs-15">Mininum</span>
                                </div>
                                <div class="col col-auto text-muted fs-15">${{$pack->min}}</div>
                            </div>
                            <div class="row pt-2 pb-2 pl-5 pr-5">
                                <div class="col">
                                    <span class="mb-0 mt-1 fs-15">Maximum</span>
                                </div>
                                <div class="col col-auto text-muted fs-15">${{$pack->max}}</div>
                            </div>
                            <div class="mb-2 mt-3 pl-5 pb-5 pr-5">
                                <div class="clearfix mb-3">
                                    <div class="float-left">
                                        <strong class="fs-15 font-weight-semibold">Principle</strong>
                                    </div>
                                    <div class="float-right">
                                        <small class="badge badge-success-light">{{$pack->principle}}</small>
                                    </div>
                                </div>
                                <div class="progress progress-xs mt-2">
                                    <div class="progress-bar   bg-primary w-65"></div>
                                </div>
                                <form action="{{route('deposit.action')}}" method="post">
                                    @csrf
                                    <input type="text" name="d_id" value="{{$pack->id}}" hidden>
                                    <button type="submit" class="btn btn-primary btn-block mt-3">Buy</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
        <!-- row closed -->
    </div>
</div>
<!-- App-content closed -->
@endsection