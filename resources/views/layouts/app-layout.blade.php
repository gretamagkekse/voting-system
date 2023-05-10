<html class="bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @googlefonts
    <title>PollPulse.com</title>
    @vite('resources/css/app.css')
</head>

<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
</body>

</html>
