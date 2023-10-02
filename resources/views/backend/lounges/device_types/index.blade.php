@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->



    <div class="page-content">
        <div class="row my-3">
            <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                <div class="card">
                    <div class="card-header">
                        <h4>Game Center: {{ $lounge->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('lounge-device-types.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $lounge->id }}" name="lounge_id">
                            <div class="mb-3">
                                <label for="device_type" class="form-label">Device Type</label>
                                <select name="device_type" class="form-control" id="device_type">
                                    <option value="">Choose</option>
                                    @foreach ($deviceTypes as $deviceType)
                                        <option value="{{ $deviceType->id }}">{{ $deviceType->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price_per_hour" class="form-label">Price Per Hour</label>
                                <input type="number" name="price_per_hour" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-inverse-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Game Center Device Types</h4>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Function to update the image based on the select box value
                function updateImage() {
                    var selectedImage = $('#device_type').val();
                    $('#showImage').attr('src', selectedImage);
                }

                // Bind the updateImage function to the change event of the select box
                $('#device_type').change(updateImage);

                // Bind the updateImage function to the change event of the file input
                $('#image').change(updateImage);
            });
        </script>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
