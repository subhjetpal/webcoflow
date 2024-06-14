<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>Webcoflow</title>

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png')}}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">


    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" /> --}}


</head>

<body>

    @yield('content')

    {{-- <script type="text/javascript" src="{{ asset('js/main.js') }}"></script> --}}
</body>

</html>
