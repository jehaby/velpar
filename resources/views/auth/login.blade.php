<!-- resources/views/auth/login.blade.php -->

@extends('layout')


@section('content')

    <div class="container myform">
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="emailField"> {{ trans('auth.email') }}</label>   {{-- TODO: name or email--}}
                <input id="emailField" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                {!! $errors->first('email', '<div class="help-block">:message</div>') !!}
            </div>

            <div class="form-group">
                <label for="passwordField"> {{ trans('auth.password') }}</label>
                <input id="passwordField" class="form-control" type="password" name="password" required>
            </div>

            <div class="form-group-sm">
                <label for="rememberMe"> {{ trans('auth.remember_me') }}</label>
                <input id="rememberMe" type="checkbox" name="remember" checked>
            </div>

            <div class="form-group">
                <button class="btn btn-default" type="submit">{{ trans('auth.login') }}</button>
            </div>
        </form>
    </div>
@endsection