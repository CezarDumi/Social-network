<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">

        <script src="https://kit.fontawesome.com/010a991770.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <script src="{{ URL::to('src/js/app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        @if (Auth::user())
            @include('includes.header')
        @endif
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
