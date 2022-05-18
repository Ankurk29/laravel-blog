<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('partials.header')

    <main class="container">
        @yield('section')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
