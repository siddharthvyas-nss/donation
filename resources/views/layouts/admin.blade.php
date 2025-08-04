<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Narayan Seva Sansthan - Admin Dashboard')</title>
    <meta name="description" content="Admin Dashboard - Narayan Seva Sansthan" />
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
        .app-header {
            background: #ffffff;
            border-bottom: 1px solid #e1e3ea;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 70px;
        }
        
        .app-sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            z-index: 999;
            background: #1e1e2d !important;
        }
        
        .app-main {
            margin-top: 70px;
            margin-left: 225px;
            min-height: calc(100vh - 70px);
        }
        
        .menu-link {
            color: #9899ac !important;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 0.475rem;
            margin: 0.25rem 0;
        }
        
        .menu-link:hover {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .menu-icon {
            margin-right: 0.75rem;
            color: #9899ac;
        }
        
        .menu-title {
            font-weight: 500;
        }
        
        .menu-arrow {
            margin-left: auto;
        }
        
        .menu-sub {
            padding-left: 1rem;
        }
        
        .menu-bullet {
            margin-right: 0.75rem;
        }
        
        .bullet {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #9899ac;
        }
        
        .app-sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background: #1e1e2d;
        }
        
        .app-sidebar-user {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .app-sidebar-user .symbol {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .app-sidebar-user .symbol:hover {
            transform: scale(1.1);
        }
        
        .app-sidebar-user img {
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .app-sidebar-menu {
            padding-bottom: 80px;
        }
        
        .app-header .d-flex.align-items-center {
            padding-top: 15px;
        }
        
        .app-header img {
            margin-top: 5px;
        }
    </style>
    <!--end::Custom Stylesheets-->
    
    @yield('styles')
</head>

<body id="kt_app_body" class="app-default">
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
                                         <!--begin::Header wrapper-->
                     <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                         <!--begin::Navbar-->
                         <div class="app-navbar flex-shrink-0">
                             <!--begin::Logout button-->
                             <div class="app-navbar-item me-1 me-lg-3">
                                 <form action="{{ route('volunteer.logout') }}" method="POST" style="display: inline;">
                                     @csrf
                                     <button type="submit" class="btn btn-danger">
                                         <i class="ki-duotone ki-exit fs-2"></i>
                                         Logout
                                     </button>
                                 </form>
                             </div>
                             <!--end::Logout button-->
                         </div>
                         <!--end::Navbar-->
                     </div>
                     <!--end::Header wrapper-->
                     
                     <!--begin::Logo-->
                     <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 ms-lg-15">
                         <a href="{{ route('volunteer.dashboard') }}">
                             <img alt="Logo" src="https://nss-main.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/08/07175854/narayanseva-main-logo-new-1.webp" class="h-20px h-lg-30px" />
                         </a>
                     </div>
                     <!--end::Logo-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column">
                    <!--begin::Sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_app_sidebar_logo, #kt_app_sidebar_footer', lg: '#kt_app_header, #kt_app_sidebar_logo, #kt_app_sidebar_footer'}" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('volunteer.dashboard') }}">
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
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-profile-user fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">Donor</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('donor.add') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add Donor</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('donor.list') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">View All</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('donor.reports') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Report(s)</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('donor.trash') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Trash</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Sidebar menu-->
                    
                    <!--begin::Sidebar footer-->
                    <div class="app-sidebar-footer flex-column-auto" id="kt_app_sidebar_footer">
                        <!--begin::User-->
                        <div class="app-sidebar-user">
                            <!--begin::User menu-->
                            <div class="app-navbar-item" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="top-start">
                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt="user" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-semibold py-4 w-275px" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-3">
                                                <img alt="Logo" src="{{ asset('assets/media/avatars/300-1.jpg') }}" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center">
                                                    {{ Auth::guard('volunteer')->user()->name ?? 'User' }}
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    {{ Auth::guard('volunteer')->user()->email ?? 'user@example.com' }}
                                                </a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ route('volunteer.profile') }}" class="menu-link px-5">My Profile</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <form action="{{ route('volunteer.logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="menu-link px-5 btn btn-link text-start w-100">
                                                Sign Out
                                            </button>
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Sidebar footer-->
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
                                @yield('content')
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                </div>
                <!--end::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    
    <!--begin::Javascript-->
    <script>var hostUrl = "assets/";</script>
    
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    
    <!--begin::Page Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    
    <!--begin::Page Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/dashboards/ecommerce.js') }}"></script>
    <!--end::Page Custom Javascript-->
    
    @yield('scripts')
    
    <!--end::Javascript-->
</body>
<!--end::Body-->
</html> 