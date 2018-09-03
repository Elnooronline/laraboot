<!-- Default box -->
<div class="box{{ (isset($solid) && $solid) ? ' box-solid ' : ' '}}box-{{ $style ?? 'default' }}">
    @if (isset($title) || isset($tools))
        <div class="box-header with-border">
            @isset($title)
                <h3 class="box-title">{{ $title }}</h3>
            @endisset
            @isset ($tools)
                <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    {{ $tools }}
                </div>
            @endisset
        </div>
    @endif
    <div class="box-body">
        {{ $slot }}
    </div>
    <!-- /.box-body -->
    @isset ($footer)
        <div class="box-footer">
            {{ $footer }}
        </div>
        <!-- /.box-footer-->
    @endisset
</div>
<!-- /.box -->