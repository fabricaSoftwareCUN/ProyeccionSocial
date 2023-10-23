<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

    <title>{{ config('app.name', 'saberProT&T') }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/icono-cun.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css?V=' . now()->format('H.s')) }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css?V=' . now()->format('H.s')) }}">
</head>

<body class="antialiased">
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div
                    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                    <div class="max-w-6xl mx-auto sm:px-1 lg:px-1">
                        <div class="flex justify-center pt-1 sm:justify-start sm:pt-0">
                            <img src="{{ asset('images/Proyección Social - Fondo blanco.png') }}" alt="logo-cun" width="400" class="sombra-inter-negro">
                        </div>
                        <div class="d-flex justify-content-center">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="mx-3 sombra btn btn-cun btn-sm">{{ __('Dashboard') }}</a>
                                @else
                                    <a href="{{ route('login') }}" class="mx-3 sombra btn btn-cun btn-sm">{{ __('Log in') }}</a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
