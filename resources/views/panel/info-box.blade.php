<div class="info-box{{ isset($style) ? ' bg-'.$style : '' }}">
    <!-- Apply any bg-* class to to the icon to color it -->
    <span class="info-box-icon{{ isset($icon_color) ? ' bg-'.$icon_color : '' }}"><i class="fa fa-{{ $icon }}"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">{{ $text }}</span>
        <span class="info-box-number">{{ $number }}</span>
        @isset ($progress)
            <!-- The progress section is optional -->
            <div class="progress">
                <div class="progress-bar" style="width: {{ $progress }}%"></div>
            </div>
        @endisset
        @isset ($progress_description)
            <span class="progress-description">
              {{ $progress_description }}
            </span>
        @endisset
    </div>
    <!-- /.info-box-content -->
</div>
<!-- /.info-box -->