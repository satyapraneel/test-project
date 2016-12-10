<!doctype html>
<html>
<head>
    @yield('title')
    @include('layouts.header-scripts')
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer-scripts')
</body>
</html>
