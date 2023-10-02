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
                        <form action="{{ route('lounge-gallery.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" value="{{ $lounge->id }}" name="lounge" class="form-control"
                                    multiple>
                                <label class="form-label">Images <code>(Multiple image supported!)</code></label>
                                <input type="file" name="image[]" class="form-control" multiple>
                            </div>
                            <button type="submit" class="btn btn-inverse-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Lounge Images</h4>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
