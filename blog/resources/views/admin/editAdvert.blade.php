@extends('layout.admin-app')
@section('content')

<div class="app-content icon-content">
    <div class="section">
        @include('layout.nav')

        <section class="section">
            <form method="POST" action="{{route('update.advert')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$title}}</h5>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" value="{{$advert->title}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- Quill Editor Full -->
                                <div class="form-group">
                                    <label>Description about the post</label>
                                    <textarea type="text" name="content" class="quill-editor-full form-control"
                                        style="height:50px;">{{$advert->content}}</textarea>
                                </div>
                                <div class="form-group py-3">
                                    <label>Banner Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group py-3">
                                            <label><strong>Start Date:</strong></label>
                                            <p><b>{{$advert->start_date}}</b></p>
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group py-3">
                                            <label><strong>End date:</strong></label>
                                            <p><b>{{$advert->end_date}}</b></p>
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="bid" value="{{$advert->id}}">
                                <div class="form-group">
                                    <label for="">Advert Position</label>
                                    <select name="position" class="form-control">
                                        <option value="header">Header</option>
                                        <option value="right">Right</option>
                                        <option value="body">Body</option>
                                        <option value="footer">Footer</option>
                                    </select>
                                </div>
                                <!-- End Quill Editor Full -->

                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>






@endsection