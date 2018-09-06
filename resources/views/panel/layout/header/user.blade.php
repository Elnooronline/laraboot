<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ 'https://www.gravatar.com/avatar/'.md5(auth()->user()->email) }}" class="user-image" alt="{{ auth()->user()->name }}">
        <span class="hidden-xs">{{ auth()->user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{ 'https://www.gravatar.com/avatar/'.md5(auth()->user()->email) }}" class="img-circle" alt="{{ auth()->user()->name }}">
            <p>
                {{ auth()->user()->name }}
                @if ($created_at = auth()->user()->created_at)
                    <small>
                        @lang('laraboot::adminlte.member_since')
                        <span title="{{ $created_at }}">
                            {{ $created_at->diffForHumans() }}
                        </span>
                    </small>
                @endif
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">@lang('laraboot::adminlte.profile')</a>
            </div>
            <div class="pull-right">
                <a href="#"
                   class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >@lang('laraboot::adminlte.log_out')</a>

                <form id="logout-form" action="{{ url(config('laraboot-panel.urls.logout', 'auth/logout')) }}" method="POST" style="display: none;">
                    @if(config('laraboot-panel.logout_method'))
                        {{ method_field(config('laraboot-panel.logout_method')) }}
                    @endif
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</li>
