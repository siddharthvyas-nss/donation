@extends('layouts.admin')

@section('title', 'Volunteer Dashboard - Narayan Seva Sansthan')

@section('content')
<!--begin::Page header-->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Dashboard
                </h2>
            </div>
        </div>
    </div>
</div>
<!--end::Page header-->
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 20-->
                    <div class="card card-flush ccard-shadow-sm">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">Welcome</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">{{ $volunteer->name }}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        
                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4 d-flex align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light">
                                        <i class="ki-duotone ki-profile-user fs-2x text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <span class="text-gray-800 fw-bold fs-6">Volunteer Status</span>
                                    <span class="text-gray-400 fw-semibold">
                                        @if($volunteer->isActive())
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-warning">Pending</span>
                                        @endif
                                    </span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 20-->
                </div>
                <!--end::Col-->
                
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 7-->
                    <div class="card card-flush ccard-shadow-sm">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                    <!--end::Currency-->
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2,420</span>
                                    <!--end::Amount-->
                                    <!--begin::Label-->
                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"></i>2.6%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Donations</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        
                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4 d-flex align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light">
                                        <i class="ki-duotone ki-dollar fs-2x text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <span class="text-gray-800 fw-bold fs-6">This Month</span>
                                    <span class="text-gray-400 fw-semibold">$1,250</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 7-->
                </div>
                <!--end::Col-->
                
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 17-->
                    <div class="card card-flush ccard-shadow-sm">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">15</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Activities Completed</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        
                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4 d-flex align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light">
                                        <i class="ki-duotone ki-chart-simple fs-2x text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <span class="text-gray-800 fw-bold fs-6">This Month</span>
                                    <span class="text-gray-400 fw-semibold">5 activities</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 17-->
                </div>
                <!--end::Col-->
                
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 20-->
                    <div class="card card-flush ccard-shadow-sm">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">25</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Hours Volunteered</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        
                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4 d-flex align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light">
                                        <i class="ki-duotone ki-clock fs-2x text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <span class="text-gray-800 fw-bold fs-6">This Month</span>
                                    <span class="text-gray-400 fw-semibold">8 hours</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 20-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            
            <!--begin::Row-->
            <div class="row g-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Chart widget 1-->
                    <div class="card card-flush ccard-shadow-sm">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Recent Activities</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Your latest volunteer activities</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        
                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bold text-muted">
                                            <th class="min-w-150px">Activity</th>
                                            <th class="min-w-140px">Date</th>
                                            <th class="min-w-120px">Hours</th>
                                            <th class="min-w-100px">Status</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-45px me-5">
                                                        <span class="symbol-label bg-light">
                                                            <i class="ki-duotone ki-heart fs-2x text-danger">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Blood Donation Camp</a>
                                                        <span class="text-muted fw-semibold text-muted d-block fs-7">Organized blood donation drive</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark fw-bold text-hover-primary d-block fs-6">Today</span>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">2:30 PM</span>
                                            </td>
                                            <td>
                                                <span class="text-dark fw-bold text-hover-primary d-block fs-6">4</span>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">hours</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-light-success">Completed</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-45px me-5">
                                                        <span class="symbol-label bg-light">
                                                            <i class="ki-duotone ki-book fs-2x text-primary">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Education Support</a>
                                                        <span class="text-muted fw-semibold text-muted d-block fs-7">Teaching underprivileged children</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark fw-bold text-hover-primary d-block fs-6">Yesterday</span>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">10:00 AM</span>
                                            </td>
                                            <td>
                                                <span class="text-dark fw-bold text-hover-primary d-block fs-6">3</span>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">hours</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-light-success">Completed</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 1-->
                </div>
                <!--end::Col-->
                
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::List widget 3-->
                    <div class="card card-flush ccard-shadow-sm">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Quick Actions</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">What would you like to do?</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        
                        <!--begin::Card body-->
                        <div class="card-body pt-2">
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center flex-grow-1 me-2">
                                    <div class="symbol symbol-45px me-3">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-plus fs-2x text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Join New Activity</a>
                                        <span class="text-gray-400 fw-semibold fs-7">Find and join volunteer activities</span>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <i class="ki-duotone ki-arrow-right fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            </div>
                            <!--end::Item-->
                            
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-4"></div>
                            <!--end::Separator-->
                            
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center flex-grow-1 me-2">
                                    <div class="symbol symbol-45px me-3">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-profile-user fs-2x text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('volunteer.profile') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Update Profile</a>
                                        <span class="text-gray-400 fw-semibold fs-7">Manage your personal information</span>
                                    </div>
                                </div>
                                <a href="{{ route('volunteer.profile') }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <i class="ki-duotone ki-arrow-right fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            </div>
                            <!--end::Item-->
                            
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-4"></div>
                            <!--end::Separator-->
                            
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center flex-grow-1 me-2">
                                    <div class="symbol symbol-45px me-3">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-duotone ki-chart-simple fs-2x text-info">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">View Reports</a>
                                        <span class="text-gray-400 fw-semibold fs-7">Check your volunteer statistics</span>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <i class="ki-duotone ki-arrow-right fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::List widget 3-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection 