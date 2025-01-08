{{-- HEADER --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoNation | @yield('title', 'Hafidz')</title>
    <link rel="icon" href="{{ asset("images/icons/icon-logo.svg") }}">
    @vite('resources/css/app.css')
    <!--
    Credit: Flowbite.com 
            SirGhazian
    -->
</head>
<body>
    <div class="container p-20">
        @yield('content')
    </div>
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    @yield('script')
</body>
</html>