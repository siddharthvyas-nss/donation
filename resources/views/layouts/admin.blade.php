<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your theme's <head> content -->
    <title>@yield('title', 'Admin Panel')</title>
    <!-- ...other head content... -->
</head>

<body>
    @include('admin.partials.header')

    <main>
        @yield('content')
    </main>

    @include('admin.partials.footer')
</body>

</html>