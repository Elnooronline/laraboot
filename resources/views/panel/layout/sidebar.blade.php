<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @foreach (config('laraboot-panel.appearence.sidebar.items') as $item)
            @include($item)
        @endforeach
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->