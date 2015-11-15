@extends('layout')

@section('content')

<div class="container myform">
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="nameField"> {{ trans('auth.name') }}</label>
            <input required id="nameField"  class="form-control" type="text" name="name" value="{{ old('name') }}">
            {!! $errors->first('name', '<div class="help-block">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="emailField"> {{ trans('auth.email') }}</label>
            <input required id="emailField"  class="form-control" type="email" name="email" value="{{ old('email') }}">
            {!! $errors->first('email', '<div class="help-block">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="passwordField"> {{ trans('auth.password') }}</label>
            <input required id="passwordField"  class="form-control" type="password" name="password">
            {!! $errors->first('password', '<div class="help-block">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="passwordReapeatField"> {{ trans('auth.confirm_password') }} </label>
            <input required id="passwordRepeatField"  class="form-control" type="password" name="password_confirmation">
        </div>

        <div class="form-group">
            <button class="btn btn-default" type="submit"> {{ trans('auth.register') }} </button>
        </div>
    </form>
</div>

@endsection