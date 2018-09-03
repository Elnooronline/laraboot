<!DOCTYPE html>
<html dir="{{ config('adminlte.appearence.dir') }}">
<head>
    @include('adminlte::layout.assets.head')

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('vendor/adminlte/css/auth.css') }}">
</head>
<body class="hold-transition register-page">
    @yield('content')
    @include('adminlte::layout.assets.footer')
    <script src="{{ url('vendor/adminlte/js/auth.js') }}"></script>
</body>
</html>
