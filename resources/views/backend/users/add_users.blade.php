@extends('admin.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add User</h6>

                            <form class="forms-sample" method="POST" action="{{ route('users.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <img class="wd-100 rounded-circle mb-4" id="showImage"
                                        src="{{ url('uploads/no_image.jpg') }}"><br>
                                    <label for="user_image" class="form-label">User image</label>
                                    <input type="file" class="form-control" name="user_image" id="image">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="user_full_name" class="form-label">Full Name</label>
                                            <input type="text"
                                                class="form-control @error('user_full_name') is-invalid @enderror"
                                                name="user_full_name">
                                            @error('user_full_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="user_name" class="form-label">Username</label>
                                            <input type="text"
                                                class="form-control @error('user_name') is-invalid @enderror"
                                                name="user_name">
                                            @error('user_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="user_email" class="form-label">Email Address</label>
                                            <input type="email"
                                                class="form-control @error('user_email') is-invalid @enderror"
                                                name="user_email">
                                            @error('user_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="user_password" class="form-label">Password</label>
                                            <input type="password"
                                                class="form-control @error('user_password') is-invalid @enderror"
                                                name="user_password">
                                            @error('user_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="user_address" class="form-label">User Address</label>
                                    <input type="text" class="form-control @error('user_address') is-invalid @enderror"
                                        name="user_address">
                                    @error('user_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label>Role</label>
                                            <select id="inputStatus" class="form-control" name="role">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                                <option value="agent">Agent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select id="inputStatus" class="form-control" name="status">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inctive</option>
                                            </select>
                                        </div>
                                    </div>
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
