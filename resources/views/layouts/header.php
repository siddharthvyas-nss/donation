<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo isset($title) ? $title : 'Narayan Seva Sansthan - Volunteer Donation Program'; ?></title>
    <meta name="description" content="Volunteer Donation Program - Narayan Seva Sansthan" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    
    <!--begin::Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    
    <!--begin::Custom Stylesheets-->
    <style>
        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .logo-container img {
            height: 40px;
            width: auto;
        }
        .logo-container span {
            font-size: 18px;
            font-weight: 600;
            color: #181C32;
        }
    </style>
    <!--end::Custom Stylesheets-->
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup-->
    <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme-mode") !== null ) { themeMode = localStorage.getItem("data-bs-theme-mode"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme-mode", themeMode); }</script>
    <!--end::Theme mode setup-->
    
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                    <!--begin::Logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="{{ route('volunteer.dashboard') }}" class="d-lg-none">
                            <div class="logo-container">
                                <img alt="Logo" src="https://nss-main.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/08/07175854/narayanseva-main-logo-new-1.webp" class="h-30px" />
                                <span>Narayan Seva Sansthan</span>
                            </div>
                        </a>
                    </div>
                    <!--end::Logo-->
                    
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                        </div>
                        <!--end::Menu wrapper-->
                        
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-user fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-semibold py-4 w-275px" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <div class="symbol symbol-50px me-3">
                                                <img alt="Logo" src="https://nss-main.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/08/07175854/narayanseva-main-logo-new-1.webp" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center">
                                                    {{ Auth::user()->name ?? 'Volunteer' }}
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary">{{ Auth::user()->email ?? 'volunteer@narayanseva.org' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="menu-item px-5">
                                        <a href="{{ route('volunteer.profile') }}" class="menu-link px-5">My Profile</a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="{{ route('volunteer.logout') }}" class="menu-link px-5">Sign Out</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::User menu-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <a href="{{ route('volunteer.dashboard') }}">
                            <div class="logo-container">
                                <img alt="Logo" src="https://nss-main.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/08/07175854/narayanseva-main-logo-new-1.webp" class="h-30px" />
                                <span>Narayan Seva Sansthan</span>
                            </div>
                        </a>
                    </div>
                    <!--end::Logo-->
                    
                    <!--begin::Sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
                            <!--begin::Scroll wrapper-->
                            <div class="scroll-y my-5 mx-3" id="kt_app_sidebar_menu_scroll" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_app_sidebar_header, #kt_app_sidebar_footer', lg: '#kt_app_header, #kt_app_sidebar_header, #kt_app_sidebar_footer'}" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('volunteer.dashboard') ? 'active' : '' }}" href="{{ route('volunteer.dashboard') }}">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-element-11 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dashboard</span>
                                        </a>
                                    </div>
                                    <!--end:Menu item-->
                                    
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('volunteer.profile') ? 'active' : '' }}" href="{{ route('volunteer.profile') }}">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-profile-user fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">My Profile</span>
                                        </a>
                                    </div>
                                    <!--end:Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Scroll wrapper-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Sidebar menu-->
                </div>
                <!--end::Sidebar-->
                
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid"> 