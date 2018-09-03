<li>
    <a href="#"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    >
        <i class="fa fa-fw fa-power-off"></i>
        @lang('adminlte::adminlte.log_out')
    </a>
    <form id="logout-form" action="{{ url(config('adminlte.urls.logout', 'auth/logout')) }}" method="POST" style="display: none;">
        @if(config('adminlte.logout_method'))
            {{ method_field(config('adminlte.logout_method')) }}
        @endif
        {{ csrf_field() }}
    </form>
</li>