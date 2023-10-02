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

                            <h6 class="card-title">Add Lounge</h6>

                            <form class="forms-sample" method="POST" action="{{ route('lounges.update', $lounges->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $lounges->id }}">
                                <div class="mb-3">
                                    <img class="wd-100 rounded-circle mb-4" id="showImage"
                                        src="{{ $lounges->image == '' ? url('uploads/no_image.jpg') : asset($lounges->image) }}"<br>
                                    <label for="lounge_image" class="form-label">Lounge image</label>
                                    <input type="file" class="form-control" name="lounge_image" id="image">
                                </div>
                                <div class="mb-3">
                                    <label for="lounge_name" class="form-label">Game Center Name</label>
                                    <input type="text" value="{{ $lounges->name }}"
                                        class="form-control @error('lounge_name') is-invalid @enderror" name="lounge_name">
                                    @error('lounge_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="agent_id" class="form-label">Owner Name</label>
                                    <select name="agent_id" class="form-control">
                                        <option value="">Choose</option>
                                        @foreach ($users as $user)
                                            <option {{ $user->id == $lounges->agent_id ? 'selected' : '' }}
                                                value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="lounge_address" class="form-label">Game Center Address</label>
                                    <input type="text" value="{{ $lounges->address }}"
                                        class="form-control @error('lounge_address') is-invalid @enderror"
                                        name="lounge_address">
                                    @error('lounge_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="lounge_description" class="form-label">Game Center Description</label>
                                    <textarea class="form-control" maxlength="100" rows="8" name="lounge_description"
                                        placeholder="This textarea has a limit of 100 chars." @error('lounge_description') is-invalid @enderror>{{ $lounges->description }}</textarea>
                                    @error('lounge_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select id="inputStatus" class="form-control" name="status">
                                        <option {{ $lounges->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $lounges->status == 0 ? 'selected' : '' }} value="0">Inctive
                                        </option>
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
