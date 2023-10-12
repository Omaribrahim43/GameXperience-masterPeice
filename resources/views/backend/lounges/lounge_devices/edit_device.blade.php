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

                            <h6 class="card-title">Edit Devices</h6>

                            <form class="forms-sample" method="POST" action="{{ route('device.update', $device->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <img class="wd-100 rounded-circle mb-4" id="showImage"
                                        src="{{ $device->image == '' ? url('uploads/no_image.jpg') : asset($device->image) }}"><br>
                                    <label for="device_image" class="form-label">Device image</label>
                                    <input type="file" class="form-control" name="device_image" id="image">
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="device_type_id" class="form-label">Device Type</label>
                                        <select name="device_type_id" class="form-control">
                                            <option value="">Choose</option>
                                            @foreach ($deviceTypes as $deviceType)
                                                <option {{ $deviceType->id == $device->device_type_id ? 'selected' : '' }}
                                                    value="{{ $deviceType->id }}">{{ $deviceType->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select id="inputStatus" class="form-control" name="status">
                                                <option {{ $device->status == 1 ? 'selected' : '' }} value="1">Active
                                                </option>
                                                <option {{ $device->status == 0 ? 'selected' : '' }} value="0">Inctive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label>VIP room</label>
                                            <select id="inputStatus" class="form-control" name="vip_room">
                                                <option {{ $device->status == 'active' ? 'selected' : '' }} value="1">
                                                    Yes</option>
                                                <option {{ $device->status == 'inactive' ? 'selected' : '' }}
                                                    value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="device_info" class="form-label">Device Information</label>
                                    <textarea class="form-control" maxlength="100" rows="8" name="device_info"
                                        placeholder="This textarea has a limit of 100 chars." @error('device_info') is-invalid @enderror>{{ $device->info }}</textarea>
                                    @error('device_info')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Update Changes</button>
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
