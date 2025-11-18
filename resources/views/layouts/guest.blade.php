<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center mb-4">
                    <!-- BEGIN NAVBAR LOGO -->
                    <a href="." aria-label="Tabler" class="navbar-brand navbar-brand-autodark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="126" height="63" viewBox="0 0 562.74 280.74"><defs><style>.cls-1{fill:#265bfa;}</style></defs><g id="Camada_2" data-name="Camada 2"><g id="Camada_1-2" data-name="Camada 1"><path class="cls-1" d="M385,192.05q0-37.5,0-75c0-8.67,4.92-13.88,13.58-13.9q56.43-.1,112.85,0c8.35,0,13.22,5,13.31,13.39q.18,18.19,0,36.37c-.09,8-5.21,13-13.21,13.15q-10.87.18-21.75,0c-2.24,0-3,.63-3,2.95-.23,10.21-.31,10.21,9.89,10.21q26.05,0,52.12,0c8.5,0,13.88,5.2,13.9,13.69q.1,37.11,0,74.23c0,8.13-5.29,13.41-13.35,13.42q-56.25,0-112.49,0c-8.34,0-13.11-4.65-13.09-12.48,0-7.34,5.14-12.21,13.15-12.23q48.36-.08,96.73,0c3.3,0,4.44-.67,4.38-4.24-.22-14.62-.17-29.25,0-43.87,0-2.91-.71-3.79-3.72-3.77-19.37.14-38.75-.18-58.11.17-10,.19-14.69-6.91-14.52-14.67.24-11.24,0-22.49.07-33.74,0-9.46,5.18-14.65,14.54-14.68,7,0,14-.07,21,0,2.1,0,2.74-.62,2.81-2.75.34-10.53.41-10.53-10-10.53-25.24,0-50.49.07-75.73-.08-3.5,0-4.59.71-4.58,4.44q.21,67.31.08,134.6c0,8.77-4.48,13.72-12.28,13.72s-12.44-4.67-12.46-12.78Q385,229.91,385,192.05Z"/><path class="cls-1" d="M289.13,103.13c25,0,50,0,75,0,8.9,0,13.91,5.11,13.49,13.32A11.65,11.65,0,0,1,367,127.69a59.74,59.74,0,0,1-6,.18q-65.81,0-131.61-.07c-3.47,0-4.78.62-4.66,4.42.29,8.89.08,8.9,9.07,8.9q26.63,0,53.24,0c9.36,0,14.59,5.22,14.6,14.63q0,55.5,0,111c0,10.47-7.8,16.39-17.05,13.11a10.73,10.73,0,0,1-7.6-9.7,55.43,55.43,0,0,1-.17-5.62c0-31.37-.07-62.74.07-94.11,0-3.47-.95-4.39-4.37-4.36-19.13.15-38.26-.22-57.37.19-10.48.22-15.54-7-15.28-15.19.36-11.12.06-22.25.1-33.37,0-9.73,4.78-14.53,14.51-14.54Q251.82,103.08,289.13,103.13Z"/><path class="cls-1" d="M150.75,121.43l-1.73-.76c-39.75-18.13-70.08-46.3-90.68-84.9-1.19-2.23-.79-3.43.87-5.06Q74,16.09,88.6,1.26c1.72-1.76,2.56-1.61,4.22.05q43.44,43.49,87,86.81c1.95,1.94,2.12,2.93.06,4.94-8.95,8.71-17.7,17.63-26.55,26.45C152.6,120.27,152,121.38,150.75,121.43Z"/><path class="cls-1" d="M90.34,182.45C77.05,169,63.82,155.59,50.49,142.24Q26.12,117.84,1.57,93.61c-2.1-2.08-2.09-3.17,0-5.23Q17.92,72.38,33.92,56c2.1-2.15,2.87-2.08,4.38.54a210.75,210.75,0,0,0,70.1,73.61c6.32,4,12.84,7.7,19.52,11.09,1.56.79,2.57,1.24.76,3C116,156.86,103.34,169.49,90.34,182.45Z"/></g></g></svg>
                    </a>
                    <!-- END NAVBAR LOGO -->
                </div>
                <div class="card card-md">
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>

                @if (Route::is('login'))
                    <div class="text-center text-secondary mt-3">{{ __('Não tem uma conta?') }} <a href="{{ route('register') }}" class="text-muted text-decoration-underline" tabindex="-1">{{ __('Cadastre-se') }}</a></div>
                @endif

                @if (Route::is('register'))
                    <div class="text-center text-secondary mt-3">{{ __('Já possui uma conta?') }} <a href="{{ route('login') }}" class="text-muted text-decoration-underline" tabindex="-1">{{ __('Faça login') }}</a></div>
                @endif

                @if (Route::is('password.request'))
                    <div class="text-center text-secondary mt-3">{{ __('Lembrou sua senha?') }} <a href="{{ route('login') }}" class="text-muted text-decoration-underline" tabindex="-1">{{ __('Faça login') }}</a></div>
                @endif
            </div>
        </div>
    </body>
</html>
