@extends('layouts.admin')

@section('title', 'Donor Reports - Narayan Seva Sansthan')

@section('content')
<!--begin::Page header-->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Donor Reports
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
                        <h3 class="card-title">Donor Statistics</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <i class="ki-duotone ki-profile-user fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Total Donors
                                                </div>
                                                <div class="text-muted">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-success text-white avatar">
                                                    <i class="ki-duotone ki-dollar fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Total Donations
                                                </div>
                                                <div class="text-muted">
                                                    ₹0
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-warning text-white avatar">
                                                    <i class="ki-duotone ki-calendar fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    This Month
                                                </div>
                                                <div class="text-muted">
                                                    0 donors
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-info text-white avatar">
                                                    <i class="ki-duotone ki-chart-simple fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Active Donors
                                                </div>
                                                <div class="text-muted">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h4>Reports Coming Soon</h4>
                            <p class="text-muted">
                                Detailed donor reports and analytics will be available here.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Content-->
@endsection 