<!DOCTYPE html>
<html dir="{{ config('laraboot-panel.appearence.dir') }}">
<head>
    @include('laraboot::panel.layout.assets.head')

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('vendor/laraboot/css/auth.css') }}">
</head>
<body class="hold-transition register-page">
    @yield('content')
    @include('laraboot::panel.layout.assets.footer')
    <script src="{{ url('vendor/laraboot/js/auth.js') }}"></script>
</body>
</html>
