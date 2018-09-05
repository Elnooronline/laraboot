<header class="main-header">
    <!-- Logo -->
    <a href="{{ config('laraboot-panel.urls.base') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! config('laraboot-panel.small_logo') !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! config('laraboot-panel.logo')  !!}</span>
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
                @foreach (config('laraboot-panel.appearence.header.items') as $item)
                    @include($item)
                @endforeach
            </ul>
        </div>
    </nav>
</header>

<!-- =============================================== -->