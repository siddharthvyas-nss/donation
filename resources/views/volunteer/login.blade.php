@extends('layouts.app')

@section('title', 'Volunteer Login - Narayan Seva Sansthan')

@section('content')
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>body { background-image: url('{{ asset('assets/media/auth/bg10.jpeg') }}'); } [data-bs-theme="dark"] body { background-image: url('{{ asset('assets/media/auth/bg10-dark.jpeg') }}'); }</style>
    <!--end::Page bg image-->
    
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <!--begin::Image-->
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-500px mb-10 mb-lg-20" src="{{ asset('assets/media/auth/login_vaulenteer.webp') }}" alt="" />
                <!--end::Image-->
                <!--begin::Title-->
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Narayan Seva Sansthan - Volunteer Program</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-600 fs-base text-center fw-semibold">‘नारायण सेवा संस्थान’ उदयपुर (राजस्थान) स्थित गैर-सरकारी और गैर-लाभकारी संगठन है। <br>इसकी देश भर में 480 से अधिक शाखाएं मौजूद हैं। विगत कई वर्षों में संस्थान ने हर आयाम में लोगों के जीवन को बदला है। <br>यह संस्थान मुख्य तौर पर दिव्यांगों की भलाई के लिए कार्य करता है और उन्हें समाज की मुख्य धारा से जोड़ने का प्रयास करता है।</div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <!--begin::Wrapper-->
            <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column align-items-stretch h-lg-50 w-md-400px">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('volunteer.login') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <img src="{{ asset('assets/media/auth/logo.jpg') }}" alt="Narayan Seva Sansthan - Volunteer Program Logo" class="mb-3" />
                                <h1 class="text-gray-900 fw-bolder mb-3">Valunteer Sign In</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Login options-->
                            <!-- <div class="row g-3 mb-9">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                    <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="h-15px me-3" />Sign in with Google</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                    <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/apple-black.svg') }}" class="theme-light-show h-15px me-3" />
                                    <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/apple-black-dark.svg') }}" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
                                </div>
                            </div>
                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                            </div> -->
                            <!--end::Separator-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" />
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <!--begin::Link-->
                                <a href="#" class="link-primary">Forgot Password ?</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign In</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Sign up-->
                            <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet? 
                            <a href="{{ route('volunteer.register') }}" class="link-primary">Sign up</a></div>
                            <!--end::Sign up-->
                            
                            <!--begin::OTP Login-->
                            <div class="text-gray-500 text-center fw-semibold fs-6 mt-3">
                            <a href="{{ route('volunteer.login.otp') }}" class="link-primary">Login with Mobile OTP</a></div>
                            <!--end::OTP Login-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-stack">
                        
                        <!--begin::Languages-->
                        <!-- <div class="me-10">
                            <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                                <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" />
                                <span data-kt-element="current-lang-name" class="me-1">English</span>
                                <i class="ki-duotone ki-down fs-5 text-muted rotate-180 m-0"></i>
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link d-flex px-5" data-kt-lang="English">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">English</span>
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/media/flags/spain.svg') }}" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">Spanish</span>
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link d-flex px-5" data-kt-lang="German">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/media/flags/germany.svg') }}" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">German</span>
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link d-flex px-5" data-kt-lang="Japanese">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/media/flags/japan.svg') }}" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">Japanese</span>
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link d-flex px-5" data-kt-lang="French">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/media/flags/france.svg') }}" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">French</span>
                                    </a>
                                </div>
                            </div>
                           
                        </div> -->
                        <!--end::Languages-->
                        <!--begin::Links-->
                        <div class="me-10 d-flex fw-semibold text-primary fs-base gap-5" style="width: 100%;">
                            <a href="#" target="_blank">Terms</a>
                            <a href="#" target="_blank">Plans</a>
                            <a href="#" target="_blank">About Us</a>
                            <a href="#" target="_blank">Contact Us</a>
                            <a href="#" target="_blank">Privacy Policy</a>
                            
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
@endsection 