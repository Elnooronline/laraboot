<header class="main-header">
    <!-- Logo -->
    <a href="{{ config('adminlte.urls.base') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! config('adminlte.small_logo') !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! config('adminlte.logo')  !!}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @foreach (config('adminlte.appearence.header.items') as $item)
                    @include($item)
                @endforeach
            </ul>
        </div>
    </nav>
</header>

<!-- =============================================== -->