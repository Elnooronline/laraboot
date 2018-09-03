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

    <table class="table">
        {{ $slot }}
        @if (isset($collection) && $collection->isEmpty())
            <tr>
                <td colspan="100%" style="text-align: center;">
                    No data available.
                </td>
            </tr>
        @endif
    </table>

    <!-- /.box-body -->
    @if (isset($footer) || (isset($collection) && method_exists($collection, 'links') && ! empty($collection->links()->toHtml())))
        <div class="box-footer">
            @isset($collection)
                <div class="pull-right">
                    {{ $collection->links() }}
                </div>
            @endisset
            {{ $footer ?? '' }}
        </div>
        <!-- /.box-footer-->
    @endif
</div>
<!-- /.box -->