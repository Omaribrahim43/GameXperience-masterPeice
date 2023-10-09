@extends('admin.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Service</h6>

                            <form class="forms-sample" method="POST" action="{{ route('service.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <img class="wd-100 rounded-circle mb-4" id="showImage" src="{{ url('uploads/no_image.jpg') }}"><br>
                                    <label for="service_image" class="form-label">Service image</label>
                                    <input type="file" class="form-control" name="service_image" id="image">
                                </div>
                                <div class="mb-3">
                                    <label for="service_title" class="form-label">Service Title</label>
                                    <input type="text" class="form-control @error('service_title') is-invalid @enderror"
                                        name="service_title">
                                    @error('service_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="service_description" class="form-label">Service Description</label>
                                    <textarea class="form-control" maxlength="100" rows="8" name="service_description"
                                        placeholder="This textarea has a limit of 100 chars." @error('service_description') is-invalid @enderror></textarea>
                                    @error('service_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select id="inputStatus" class="form-control" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inctive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>
@endsection
