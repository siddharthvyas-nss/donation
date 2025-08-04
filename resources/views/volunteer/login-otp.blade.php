@extends('layouts.app')

@section('title', 'Volunteer OTP Login - Narayan Seva Sansthan')

@section('content')
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>body { background-image: url('{{ asset('assets/media/patterns/header-bg.jpg') }}'); } [data-bs-theme="dark"] body { background-image: url('{{ asset('assets/media/patterns/header-bg-dark.jpg') }}'); }</style>
    <!--end::Page bg image-->
    
    <!--begin::Authentication - Two Factor -->
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center text-center p-10">
            <!--begin::Wrapper-->
            <div class="card card-flush w-md-400px">
                <!--begin::Header-->
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-title fw-bold text-dark">Login with Mobile OTP</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Enter your mobile number to receive OTP</span>
                    </h3>
                </div>
                <!--end::Header-->
                
                <!--begin::Body-->
                <div class="card-body py-5 py-lg-15">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_otp_form" method="POST" action="{{ route('volunteer.login.otp') }}">
                        @csrf
                        
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Mobile-->
                            <div class="input-group">
                                <input type="text" placeholder="Mobile Number" name="mobile" id="mobile_input" autocomplete="off" class="form-control bg-transparent @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" />
                                <button type="button" id="kt_send_otp" class="btn btn-primary">Send OTP</button>
                            </div>
                            @error('mobile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <!--end::Mobile-->
                        </div>
                        <!--end::Input group-->
                        
                        <!--begin::Input group-->
                        <div class="fv-row mb-8" id="otp_section" style="display: none;">
                            <!--begin::OTP-->
                            <input type="text" placeholder="Enter 6-digit OTP" name="otp" autocomplete="off" class="form-control bg-transparent @error('otp') is-invalid @enderror" maxlength="6" />
                            @error('otp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <!--end::OTP-->
                        </div>
                        <!--end::Input group-->
                        
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10" id="login_button" style="display: none;">
                            <button type="submit" id="kt_sign_in_otp_submit" class="btn btn-primary">
                                <span class="indicator-label">Login with OTP</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Submit button-->
                        
                        <!--begin::Resend OTP-->
                        <div class="text-center" id="resend_section" style="display: none;">
                            <button type="button" id="kt_resend_otp" class="btn btn-link text-primary fw-semibold fs-6">
                                Resend OTP
                            </button>
                        </div>
                        <!--end::Resend OTP-->
                        
                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6 mt-5">Don't have an account?
                        <a href="{{ route('volunteer.register') }}" class="link-primary fw-semibold">Sign up</a></div>
                        <!--end::Sign up-->
                        
                        <!--begin::Password Login-->
                        <div class="text-gray-500 text-center fw-semibold fs-6 mt-3">
                        <a href="{{ route('volunteer.login') }}" class="link-primary fw-semibold">Login with Password</a></div>
                        <!--end::Password Login-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Two Factor-->
</div>
<!--end::Root-->
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Send OTP functionality
    $('#kt_send_otp').click(function() {
        var mobile = $('#mobile_input').val();
        if (!mobile) {
            alert('Please enter your mobile number first');
            return;
        }
        
        // Disable button and show loading
        $(this).prop('disabled', true).text('Sending...');
        
        $.ajax({
            url: '{{ route("volunteer.login.send-otp") }}',
            method: 'POST',
            data: {
                mobile: mobile,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    var message = 'OTP sent successfully! Please check your mobile.';
                    if (response.debug_otp) {
                        message += '\n\nDebug OTP: ' + response.debug_otp;
                    }
                    alert(message);
                    $('#otp_section').show();
                    $('#login_button').show();
                    $('#resend_section').show();
                    $('#mobile_input').prop('readonly', true);
                } else {
                    alert(response.message || 'Error sending OTP');
                }
            },
            error: function(xhr) {
                alert('Error sending OTP. Please try again.');
            },
            complete: function() {
                $('#kt_send_otp').prop('disabled', false).text('Send OTP');
            }
        });
    });
    
    // Resend OTP functionality
    $('#kt_resend_otp').click(function() {
        var mobile = $('#mobile_input').val();
        if (!mobile) {
            alert('Please enter your mobile number first');
            return;
        }
        
        // Disable button and show loading
        $(this).prop('disabled', true).text('Sending...');
        
        $.ajax({
            url: '{{ route("volunteer.resend.otp") }}',
            method: 'POST',
            data: {
                mobile: mobile,
                type: 'mobile',
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('OTP sent successfully!');
            },
            error: function(xhr) {
                alert('Error sending OTP. Please try again.');
            },
            complete: function() {
                $('#kt_resend_otp').prop('disabled', false).text('Resend OTP');
            }
        });
    });
});
</script>
@endsection 