<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Kasir</title>
    {{-- link untuk css bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

</head>
<body class="">

    @include('shared.header')

    @yield('content')
    @include('shared.footer')

    {{-- link untuk js bootstrap --}}
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
