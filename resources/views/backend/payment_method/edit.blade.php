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

                            <h6 class="card-title">Edit Payment Method</h6>

                            <form class="forms-sample" method="POST"
                                action="{{ route('payment-method.update', $paymentMethod->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12 col-xl-12">
                                    <div class="mb-3">
                                        <label for="user" class="form-label">User</label>
                                        <select name="user_id" class="form-control">
                                            <option value="">Choose</option>
                                            @foreach ($users as $user)
                                                <option {{ $paymentMethod->user_id == $user->id ? 'selected' : '' }}
                                                    value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="payment_type" class="form-label">Payment Type</label>
                                    <input type="text" class="form-control @error('payment_type') is-invalid @enderror"
                                        name="payment_type" value="{{ $paymentMethod->payment_type }}">
                                    @error('payment_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="payment_details" class="form-label">Payment Details</label>
                                    <input type="text"
                                        class="form-control @error('payment_details') is-invalid @enderror"
                                        name="payment_details" value="{{ $paymentMethod->payment_details }}">
                                    @error('payment_details')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <div class="input-group flatpickr" id="flatpickr-date">
                                        <input type="text" name="expiry_date"
                                            class="form-control flatpickr-input active @error('expiry_date') is-invalid @enderror"
                                            placeholder="Select date" value="{{ $paymentMethod->expiry_date }}"
                                            data-input="">
                                        <span class="input-group-text input-group-addon" data-toggle="">
                                            <i class="fa-regular fa-calendar fa-lg"></i>
                                        </span>
                                        @error('payment_details')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="billing_address" class="form-label">Billing Address</label>
                                    <input type="text"
                                        class="form-control @error('billing_address') is-invalid @enderror"
                                        name="billing_address" value="{{ $paymentMethod->billing_address }}">
                                    @error('billing_address')
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
