<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/goog.svg') }}" type="image/x-icon">
    <title>GDSC USU</title>
    @vite('resources/css/app.css')
    @yield('js')
</head>
<body>
    @include('components\navbar')

    {{-- Main Content --}}
    @yield('content')

    @include('components\footer')
</body>
@yield('script');
</html>