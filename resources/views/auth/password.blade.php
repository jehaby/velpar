<!-- resources/views/auth/password.blade.php -->

@extends('layout')

@section('content')

    <div class="container myform">
        <form method="POST" action="/password/email">
            {!! csrf_field() !!}

            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="form-group">
                <label for="emailField"> {{ trans('auth.email') }}</label>   {{-- TODO: name or email--}}
                <input id="emailField" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <button class="btn btn-default" type="submit">
                    {{ trans('auth.send_password_reset') }}
                </button>
            </div>
        </form>

@endsection