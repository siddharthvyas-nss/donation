 @include('admin.partials.header')
 <div class="container">
     <main>

         <div class="d-flex flex-column flex-root">
             <!--begin::Page-->
             <div class="page d-flex flex-row flex-column-fluid">
                 <!--begin::Aside-->
                 <div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                     <!--begin::Brand-->
                     <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
                         <!--begin::Logo-->
                         <a href="index.html">
                             <img alt="Logo" src="assets/media/logos/demo3.svg" class="h-20px logo theme-light-show" />
                             <img alt="Logo" src="assets/media/logos/demo3-dark.svg" class="h-20px logo theme-dark-show" />
                         </a>
                         <!--end::Logo-->
                     </div>
                     <!--end::Brand-->
                     <!--begin::Aside menu open-->
                     @include('admin.partials.menu')
                     <!--begin::Aside menu closed-->
                     @yield('content')
                 </div>
             </div>
         </div>
     </main>
 </div>

 <!-- Scripts -->
 @include('admin.partials.footer')
 @stack('scripts')
 </body>

 </html>