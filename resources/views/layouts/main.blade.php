<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
</head>
<body>
<nav class="navbar is-primary" role="navigation" aria-label="main navigation" style="margin-bottom: 25px;">
    <div class="navbar-brand">
        <a class="navbar-item" href="#"><h1 class="is-size-4">Library</h1></a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>
</nav>
<div class="container is-fluid">
    @yield('content')
</div>
</body>
</html>