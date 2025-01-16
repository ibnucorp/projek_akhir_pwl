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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

            {{-- Modal --}}
    <x-mymodal/>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('successModal');
            const closeModalButton = document.getElementById('closeModalButton');
            const modalCloseButton = document.getElementById('modalCloseButton');
            const message = "{{ session('success') }}";

            // If there's a success message, show the modal
            if (message) {
                const modalMessage = document.getElementById('modalMessage');
                modalMessage.textContent = message; // Set the success message
                modal.classList.remove('hidden'); // Show the modal
            }

            // Close modal when buttons are clicked
            [closeModalButton, modalCloseButton].forEach(button => {
                button.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            });
        });
    </script>
    {{-- /Modal --}}
    </body>
</html>
