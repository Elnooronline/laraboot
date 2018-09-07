@extends('laraboot::panel.auth.layout', ['title' => trans('laraboot::panel.sign_in')])

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('laraboot-panel.urls.base') }}">
                {!! config('laraboot-panel.logo') !!}
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">@lang('laraboot::panel.login_message')</p>

            <form action="{{ url(config('laraboot-panel.urls.login')) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="@lang('laraboot::panel.email')">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="@lang('laraboot::panel.password')">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember">
                                @lang('laraboot::panel.remember_me')
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            @lang('laraboot::panel.sign_in')
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            @if($passwordRequestUrl = config('laraboot-panel.urls.password_request'))
                <a href="{{ url($passwordRequestUrl) }}">@lang('laraboot::panel.i_forgot_my_password')</a><br>
            @endif

            @if($registerUrl = config('laraboot-panel.urls.register'))
                <a href="{{ url($registerUrl) }}" class="text-center">@lang('laraboot::panel.register_a_new_membership')</a>
            @endif

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection