@extends('layouts.app')

@section('title', 'Email Verification - Narayan Seva Sansthan')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Row-->
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <!--begin::Logo-->
                    <div class="text-center mb-5">
                        <img src="https://nss-main.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/08/07175854/narayanseva-main-logo-new-1.webp" 
                             alt="Narayan Seva Sansthan" 
                             style="max-height: 100px; width: auto;" />
                    </div>
                    <!--end::Logo-->
                    <!--begin::Card-->
                    <div class="card card-flush ccard-shadow-sm">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title Container-->
                            <div class="text-center w-100">
                                <!--begin::Title-->
                                <div class="mb-2">
                                    <h2 class="fs-2hx fw-bold text-dark lh-1 ls-n2">Email Verification</h2>
                                </div>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="mb-0">
                                    <p class="text-gray-400 fw-semibold fs-6">Verify your email address to continue</p>
                                </div>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title Container-->
                        </div>
                        <!--end::Header-->
                        
                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('email'))
                                <div class="alert alert-success">
                                    <strong>Email:</strong> {{ session('email') }}
                                    <br><small class="text-muted">This email will be verified</small>
                                </div>
                            @endif

                            @if(session('email_otp_' . (session('email') ?? old('email'))))
                                <div class="alert alert-info">
                                    <strong>Testing OTP:</strong> {{ session('email_otp_' . (session('email') ?? old('email'))) }}
                                    <br><small class="text-muted">This is for testing purposes only. In production, this would be sent via email.</small>
                                </div>
                            @endif

                            <!--begin::Form-->
                            <form action="{{ route('volunteer.verify.email.post') }}" method="POST">
                                @csrf
                                
                                <!--begin::Input group-->
                                <div class="fv-row mb-8">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Email Address</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="email" class="form-control form-control-solid" 
                                           placeholder="Enter your email address"
                                           value="{{ session('email') ?? old('email') }}"
                                           readonly required />
                                    <!--end::Input-->
                                    <div class="form-text">This is the email you registered with</div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-8">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">OTP Code</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="input-group">
                                        <input type="text" name="otp" class="form-control form-control-solid" 
                                               placeholder="Enter 6-digit OTP" maxlength="6" required />
                                        <button type="button" class="btn btn-outline-primary" id="resendOtpBtn">
                                            Resend OTP
                                        </button>
                                    </div>
                                    <!--end::Input-->
                                    <div class="form-text">Enter the 6-digit OTP sent to your email address</div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Submit button-->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Verify Email</span>
                                    </button>
                                </div>
                                <!--end::Submit button-->
                            </form>
                            <!--end::Form-->

                            <!--begin::Divider-->
                            <div class="separator separator-content my-8">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">Or</span>
                            </div>
                            <!--end::Divider-->

                            <!--begin::Links-->
                            <div class="d-flex flex-center">
                                <a href="{{ route('volunteer.login') }}" class="text-gray-600 text-hover-primary fs-6 fw-semibold">
                                    Back to Login
                                </a>
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

@section('scripts')
<script>
document.getElementById('resendOtpBtn').addEventListener('click', function() {
    const email = document.querySelector('input[name="email"]').value;
    if (!email) {
        alert('Email is required');
        return;
    }
    
    this.disabled = true;
    this.textContent = 'Sending...';
    
    fetch('{{ route("volunteer.resend.otp") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            mobile: email, // Using mobile field for email
            type: 'email'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert('OTP sent successfully!');
            // Don't reload page, just update the OTP display
            setTimeout(() => {
                location.reload();
            }, 1000);
        } else {
            alert('Error sending OTP: ' + (data.error || 'Unknown error'));
        }
    })
    .catch(error => {
        alert('Error sending OTP: ' + error.message);
    })
    .finally(() => {
        this.disabled = false;
        this.textContent = 'Resend OTP';
    });
});
</script>
@endsection 