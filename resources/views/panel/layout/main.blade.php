<!DOCTYPE html>
<html dir="{{ config('laraboot-panel.appearence.dir') }}" lang="{{ app()->getLocale() }}">
<head>
    @include('laraboot::layout.assets.head')
</head>
<body class="hold-transition skin-{{ config('laraboot-panel.appearence.skin') }} sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('laraboot::panel.layout.header')

    @include('laraboot::panel.layout.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('laraboot::panel.layout.footer')
</div>
<!-- ./wrapper -->

@include('laraboot::panel.layout.assets.footer')

@stack('scripts')
</body>
</html>
