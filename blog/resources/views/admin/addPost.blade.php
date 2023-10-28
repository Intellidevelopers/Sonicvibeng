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

        <section class="section">
            <form method="POST" action="{{route('submit.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$title}}</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select name="cid" class="form-control">
                                                @foreach($category as $sub)
                                                <option value="{{$sub->id}}">{{$sub->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <!-- Quill Editor Full -->

                                <div class="form-group py-3">
                                    <label>Current Featured Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Content section one(Paragraph one)</label>
                                    <textarea type="text" name="body" class="content form-control"
                                        style="height:200px;"></textarea>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Upload video</label>
                                            <input type="file" class="form-control" name="video">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group ">
                                            <label><strong>Post Status</strong></label>
                                            <select name="status" class="form-control">
                                                <option>Select Post status</option>
                                                <option value="pending">Pending</option>
                                                <option value="approved">Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group py-3">
                                            <label><strong>Trending:</strong></label>
                                            <label>No</label>
                                            <input type="checkbox" name="trend" class="group1" value="0">
                                            <span>Yes</span>
                                            <input type="checkbox" name="trend" class="group1" value="1">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group py-3">
                                            <label><strong>Slide:</strong></label>
                                            <label>No</label>
                                            <input type="checkbox" name="slide" class="slide1" value="0">
                                            <span>Yes</span>
                                            <input type="checkbox" name="slide" class="slide1" value="1">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Quill Editor Full -->

                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

    </div>
    </form>
    </section>

    </main><!-- End #main -->

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