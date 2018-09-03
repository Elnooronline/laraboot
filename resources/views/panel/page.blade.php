<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $title }}
        @isset($sub_title)<small>{{ $sub_title }}</small>@endisset
    </h1>
    @isset($breadcrumb)
        @if (is_array($breadcrumb))
            {{ Breadcrumbs::render(...$breadcrumb) }}
        @else
            {{ Breadcrumbs::render($breadcrumb) }}
        @endif
    @endisset
</section>

<!-- Main content -->
<section class="content">
    @include('flash::message')
    {{ $slot }}
</section>
<!-- /.content -->

@push('scripts')
    <script>
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endpush