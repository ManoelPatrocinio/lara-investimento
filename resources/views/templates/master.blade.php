<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Investindo</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    @yield('css-view')
</head>

<body>
    @include('templates.menu-lateral')
    @yield('conteudo-view')
    @yield('js-view')
</body>

</html>

