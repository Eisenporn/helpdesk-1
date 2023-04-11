<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
    <title>@yield('page_title')</title>
</head>

<body>
    @guest
        @yield('content')
    @endguest
    @auth
        @yield('content')
    @endauth
</body>

</html>
