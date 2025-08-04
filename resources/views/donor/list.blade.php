@extends('layouts.admin')

@section('title', 'Donor List - Narayan Seva Sansthan')

@section('content')
<!--begin::Page header-->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Donor List
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('donor.add') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ki-duotone ki-plus fs-2"></i>
                        Add New Donor
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Page header-->

<!--begin::Content-->
<div class="page-body">
    <div class="container-xl">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Donors</h3>
                    </div>
                    <div class="card-body">
                        @if(count($donors) > 0)
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($donors as $donor)
                                            <tr>
                                                <td>{{ $donor->name }}</td>
                                                <td>{{ $donor->email }}</td>
                                                <td>{{ $donor->mobile }}</td>
                                                <td>{{ $donor->city }}</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty">
                                <div class="empty-img">
                                    <img src="{{ asset('assets/media/illustrations/undraw_printing_invoices_5r4r.svg') }}" height="128" alt="">
                                </div>
                                <p class="empty-title">No donors found</p>
                                <p class="empty-subtitle text-muted">
                                    Try adding a new donor to get started.
                                </p>
                                <div class="empty-action">
                                    <a href="{{ route('donor.add') }}" class="btn btn-primary">
                                        <i class="ki-duotone ki-plus fs-2"></i>
                                        Add Donor
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Content-->
@endsection 