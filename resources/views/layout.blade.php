<!DOCTYPE html>
<html>
<head>
    @section('head')
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/all.js"></script>
    @show
</head>
<body>

@include('header')

<div class="container-fluid">

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    @yield('content')

</div>

<script>
    $(document).ready(function() {
        $('.alert-success').delay(1969).fadeOut();
    })
</script>

</body>
</html>
