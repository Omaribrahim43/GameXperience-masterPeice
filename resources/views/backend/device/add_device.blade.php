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

                            <h6 class="card-title">Add Devices</h6>

                            <form class="forms-sample" method="POST" action="{{ route('device.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <img class="wd-100 rounded-circle mb-4" id="showImage"
                                        src="{{ url('uploads/no_image.jpg') }}"><br>
                                    <label for="device_image" class="form-label">Device image</label>
                                    <input type="file" class="form-control" name="device_image" id="image">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="lounge_id" class="form-label">Game Center</label>
                                            <select name="lounge_id" class="form-control">
                                                <option value="">Choose</option>
                                                @foreach ($lounges as $lounge)
                                                    <option value="{{ $lounge->id }}">{{ $lounge->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="device_type_id" class="form-label">Device Type</label>
                                            <select name="device_type_id" class="form-control">
                                                <option value="">Choose</option>
                                                @foreach ($deviceTypes as $deviceType)
                                                    <option value="{{ $deviceType->id }}">{{ $deviceType->type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select id="inputStatus" class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inctive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label>VIP room</label>
                                            <select id="inputStatus" class="form-control" name="vip_room">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="device_info" class="form-label">Device Information</label>
                                    <textarea class="form-control" maxlength="100" rows="8" name="device_info"
                                        placeholder="This textarea has a limit of 100 chars." @error('device_info') is-invalid @enderror></textarea>
                                    @error('device_info')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
