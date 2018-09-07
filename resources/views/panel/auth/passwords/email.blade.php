@extends('laraboot::auth.layout')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('laraboot-panel.urls.base') }}">
                {!! config('laraboot-panel.logo') !!}
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">@lang('laraboot::panel.password_reset_message')</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ url(config('laraboot-panel.urls.password_email', 'password/email')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}"
                           placeholder="@lang('laraboot::panel.email')">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('laraboot::panel.send_password_reset_link') }}</button>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection