@extends('layouts.admin')

@section('title', 'Donor Trash - Narayan Seva Sansthan')

@section('content')
<!--begin::Page header-->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Deleted Donors
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
                        <h3 class="card-title">Trash</h3>
                    </div>
                    <div class="card-body">
                        <div class="empty">
                            <div class="empty-img">
                                <img src="{{ asset('assets/media/illustrations/undraw_quitting_time_dm8t.svg') }}" height="128" alt="">
                            </div>
                            <p class="empty-title">No deleted donors</p>
                            <p class="empty-subtitle text-muted">
                                Deleted donors will appear here.
                            </p>
                            <div class="empty-action">
                                <a href="{{ route('donor.list') }}" class="btn btn-primary">
                                    <i class="ki-duotone ki-arrow-left fs-2"></i>
                                    Back to Donor List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Content-->
@endsection 