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
                            <div class="col-lg-12">
                                <h5 class="card-title">{{$title}}</h5>
                            </div>
                            <hr>
                            <div class="col-lg-12">
                                <h4>Name: {{$post->name}}</h4>
                                <h4>Email: {{$post->email}}</h4>
                                <h5>Message content</h5>
                                <p>{{$post->message}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div><!-- End #main -->
</div>

@endsection