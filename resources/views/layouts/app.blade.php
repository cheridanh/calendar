<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name')) | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="@stack('stylesheet')">
</head>
<body>

    @if(Route::is(route('calendar.index')))
        <header class="container d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            @if(Route::is('app_management'))
                <h1 href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <a href="{{ route('app_home') }}" class="nav-link" aria-current="page">{{ config('app.name') }}</a>
                </h1>
            @else
                <h1 href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    {{ config('app.name') }}
                </h1>
            @endif
        </header>
    @endif

    <main class="container">
        <div class="p-5 text-center bg-body-tertiary rounded-3">

        @if( Session::has('notification.message') )
            <div class="container alert alert-{{ Session::get('notification.type') }}" role="alert">
                {{ Session::get('notification.message') }}
            </div>
        @endif

        @yield('content')

        </div>
    </main>

    <footer class="footer text-center">
        <p>
            &copy; {{ date("Y") }} ITIC Paris.
        </p>
    </footer>

</body>
</html>
