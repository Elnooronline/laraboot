@extends('adminlte::auth.layout', ['title' => trans('adminlte::adminlte.sign_in')])

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('adminlte.urls.base') }}">
                {!! config('adminlte.logo') !!}
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">@lang('adminlte::adminlte.login_message')</p>

            <form action="{{ url(config('adminlte.urls.login')) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="@lang('adminlte::adminlte.email')">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="@lang('adminlte::adminlte.password')">
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
                                @lang('adminlte::adminlte.remember_me')
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            @lang('adminlte::adminlte.sign_in')
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            @if($passwordRequestUrl = config('adminlte.urls.password_request'))
                <a href="{{ url($passwordRequestUrl) }}">@lang('adminlte::adminlte.i_forgot_my_password')</a><br>
            @endif

            @if($registerUrl = config('adminlte.urls.register'))
                <a href="{{ url($registerUrl) }}" class="text-center">@lang('adminlte::adminlte.register_a_new_membership')</a>
            @endif

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection