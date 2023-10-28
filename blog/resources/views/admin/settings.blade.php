@extends('layout.admin-app')
@section('content')
<script type="text/javascript">
$(window).on('load', function() {
    $('#myModal').modal('show');
});
</script>
<div class="app-content icon-content">
    <div class="section">
        @include('layout.nav')

        <section class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">{{$title}}</h5>
                            <form method="POST" action="{{route('add.settings')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Website Name</label>
                                            <input type="text" name="sitename" class="form-control"
                                                value="{{$settings->sitename}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Copyright Text * In Any Language</label>
                                            <input type="text" name="copyright" class="form-control"
                                                value="{{$settings->copyright}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-6 ">
                                        <div class="form-group">
                                            <div class="mt-3">
                                                <img src="{{asset('upload')}}/{{$settings->logo}}" class="img-fluid"
                                                    style="height:50px;">
                                            </div>
                                            <label>Logo </label>
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <div class="mt-3">
                                                <img src="{{asset('upload')}}/{{$settings->favicon}}" class="img-fluid"
                                                    style="height:50px;">
                                            </div>
                                            <label><strong>Favicon</strong></label>
                                            <input type="file" name="favicon" class="form-control">
                                        </div>
                                    </div>
                                </div><br>
                                <i style="font-weight: bold;">These section is for Chat bot </i>
                                <div class="row">
                                    <div class="col-lg-6 col-12 ">
                                        <div class="form-group">
                                            <label> Chat bot Status</label>
                                            <select name="chatstatus" class="form-control">
                                                <option value="{{$settings->chatstatus}}">{{$settings->chatstatus}}
                                                </option>
                                                <option value="pending">Pending</option>
                                                <option value="approved">Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Chat link</label>
                                            <input type="text" name="link" class="form-control"
                                                value="{{$settings->link}}">
                                        </div>
                                    </div>
                                </div>


                                <!-- Quill Editor Full -->
                                <div class="form-group mt-3">
                                    <label><strong>About Content</strong> </label>
                                    <textarea type="text" name="about" class=" form-control"
                                        value="{{$settings->about}}" style="height:200px;">
                                    {{$settings->about}}
                                    </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group my-3">
                                            <label><strong>Description</strong> </label>
                                            <textarea type="text" name="description" class=" form-control"
                                                style="height:100px;">
                                            {{$settings->description}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group my-3">
                                            <label><strong>Footer Content</strong> </label>
                                            <textarea type="text" name="footer" class=" form-control"
                                                style="height:100px;">
                                            {{$settings->footer}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> Address</label>
                                            <input type="text" name="address" value="{{$settings->address}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- End Quill Editor Full -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            </form>
        </section>

    </div><!-- End #main -->
</div>

<script>
$(document).ready(function() {
    $('input.group1').on('change', function() {
        $('input.group1').not(this).prop('checked', false);
    });
    //function for features
    $('input.feature1').on('change', function() {
        $('input.feature1').not(this).prop('checked', false);
    });

    //function for slide
    $('input.slide1').on('change', function() {
        $('input.slide1').not(this).prop('checked', false);
    });
});
</script>

@endsection