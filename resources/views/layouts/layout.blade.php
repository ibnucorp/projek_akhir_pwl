{{-- HEADER --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoNation | @yield('title', 'Hafidz')</title>
    <link rel="icon" href="{{ asset("images/icons/icon-logo.svg") }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-0L2B8UYb.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
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
    <script src="{{ asset('build/assets/app-Cy98PJ2n.js') }}"></script>
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    @yield('script')

    {{-- Nav dropdown script --}}
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }
    </script>
</body>
</html>