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
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5 col-sm-12">
                <div class="card overflow-hidden">
                    <div class=" card-body">
                        <div class="ribbon-mode4l " style="height: 70px ;">
                            <span class="ribbon3 text-white">Make payment</span>
                        </div>
                        <div class="mt-3">
                            <form action="">
                                @csrf
                                <div class="form-group">
                                    <label for="">Enter Amount</label>
                                    <input type="text" class="form-control" name="amount" />
                                </div>
                                <div class="form-group">
                                    <label for="">Select Payment Method</label>
                                    <select name="method" class="form-control">
                                        <option>Choose method</option>
                                        @if(!empty($methods))
                                        @foreach($methods as $method)
                                        <option value="{{$method->id}}">{{$method->title}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Payment</button>
                                </div>
                            </form>
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