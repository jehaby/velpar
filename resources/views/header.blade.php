<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Velomania Parser</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @if( Auth::check() )
                <li {{ Request::is('form') ? 'class=active' : '' }}><a href="/form"> Профиль </a></li>
                <li {{ Request::is('form') ? 'class=active' : '' }}><a href="/form"> Паттерны </a></li>
                <li {{ Request::is('/') ? 'class=active' : '' }}><a href="/"> Темы <span class="sr-only">(current)</span></a></li>
            @else
                <li {{ Request::url() == route('login_form') ? 'class=active' : '' }}>
                    <a href="{{ route('login_form') }}"> {{ trans('auth.login') }} </a>
                </li>
                <li {{ Request::url() == route('register_form') ? 'class=active' : '' }}>
                    <a href=" {{ route('register_form') }} "> {{ trans('auth.register') }}</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

