@extends('layouts.layout')
@section('title', 'Dashboard')

@section('content')
<div class="flex h-screen bg-gray-100">
    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-md">
        <div class="p-6">
            <h1 class="text-lg font-bold text-gray-800">Dashboard</h1>
        </div>
        <nav class="mt-4">
            <ul>
                <li>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-200 hover:text-gray-900">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-200 hover:text-gray-900">
                        Donation History
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">
        {{-- Header --}}
        <header class="bg-white shadow p-4">
            <h1 class="text-xl font-bold text-gray-800">Welcome to the Dashboard</h1>
        </header>
        {{-- Content Area --}}
        <main class="flex-1 p-6 bg-gray-100">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-700">Welcome!</h2>
                <p class="mt-2 text-gray-600">This is your dashboard.</p>
                <a href="/" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Go to Home
                </a>
            </div>
        </main>
    </div>
</div>
@endsection
