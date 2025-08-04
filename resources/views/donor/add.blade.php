@extends('layouts.admin')

@section('title', 'Add Donor - Narayan Seva Sansthan')

@section('content')
<!--begin::Page header-->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Add New Donor
                </h2>
            </div>
        </div>
    </div>
</div>
<!--end::Page header-->

<!--begin::Content-->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Donor Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('donor.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Full Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter full name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Email Address</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Mobile Number</label>
                                        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter mobile number" value="{{ old('mobile') }}" required>
                                        @error('mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Address</label>
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" placeholder="Enter complete address" required>{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label required">City</label>
                                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Enter city" value="{{ old('city') }}" required>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label required">State</label>
                                        <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" placeholder="Enter state" value="{{ old('state') }}" required>
                                        @error('state')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label required">Pincode</label>
                                        <input type="text" name="pincode" class="form-control @error('pincode') is-invalid @enderror" placeholder="Enter pincode" value="{{ old('pincode') }}" required>
                                        @error('pincode')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Add Donor
                                </button>
                                <a href="{{ route('donor.list') }}" class="btn btn-secondary">
                                    <i class="ki-duotone ki-arrow-left fs-2"></i>
                                    Back to List
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Content-->
@endsection 