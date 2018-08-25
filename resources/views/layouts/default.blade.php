<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fórum</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <header>
        @include('layouts.default.header')
    </header>

    <main>
        <section id="app" class="container">
            @yield('content')
        </section>
    </main>

    @include('layouts.default.footer')

    <!-- Carrega os arquivos js -->
    @component('layouts.default.body_scripts')
        @stack('scripts')
    @endcomponent
</body>
</html>