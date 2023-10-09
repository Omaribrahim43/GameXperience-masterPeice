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

                            <h6 class="card-title">Add Device Type</h6>

                            <form class="forms-sample" method="POST" action="{{ route('device-types.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <img class="wd-100 rounded-circle mb-4" id="showImage"
                                        src="{{ url('uploads/no_image.jpg') }}"><br>
                                    <label for="device_type_image" class="form-label">Device Type image</label>
                                    <input type="file" class="form-control" name="device_type_image" id="image">
                                </div>
                                <div class="mb-3">
                                    <label for="device_type" class="form-label">Device Type</label>
                                    <input type="text" class="form-control @error('device_type') is-invalid @enderror"
                                        name="device_type">
                                    @error('device_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="device_type_description" class="form-label">Device Type Description</label>
                                    <textarea class="form-control" maxlength="100" rows="8" name="device_type_description"
                                        placeholder="This textarea has a limit of 100 chars." @error('device_type_description') is-invalid @enderror></textarea>
                                    @error('device_type_description')
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
