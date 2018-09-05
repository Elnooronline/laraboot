<li>
    <a href="#"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    >
        <i class="fa fa-fw fa-power-off"></i>
        @lang('laraboot::adminlte.log_out')
    </a>
    <form id="logout-form" action="{{ url(config('laraboot-panel.urls.logout', 'auth/logout')) }}" method="POST" style="display: none;">
        @if(config('laraboot-panel.logout_method'))
            {{ method_field(config('laraboot-panel.logout_method')) }}
        @endif
        {{ csrf_field() }}
    </form>
</li>