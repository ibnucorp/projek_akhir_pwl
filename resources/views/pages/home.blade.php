@extends('layouts.layout')

@section('content')
<x-banner/>
<x-navbar/>

<div id="kebutuhan" class="my-5">
    <h1 class="font-semibold text-2xl">Kebutuhan Mendesak</h1>
    <div class="cards">
        <div class="flex flex-wrap justify-center gap-6 p-6">
        <!-- Card -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white shadow-md rounded-lg flex flex-col">
                        <!-- Image Section -->
                        <img src="{{ asset('images/donasi/' . $post->image_url.'.png') }}" 
                            alt="{{ $post->title }}" 
                            class="w-full h-40 object-cover rounded-t-lg">

                        <!-- Content Section -->
                        <div class="p-4 flex-grow">
                            <div class="h-16 flex flex-col justify-end">
                                <h2 class="text-lg font-bold text-gray-800">{{ Str::limit($post->title, 40) }}</h2>
                                <hr class="mt-2">
                            </div>
                            <p class="text-sm text-justify text-gray-600 mt-4">{{ Str::limit($post->description, 150) }}</p>
                        </div>

                        <div class="p-4">
                            <!-- Progress Bar -->
                            <div class="mt-4">
                                <div class="bg-gray-300 rounded-full h-2">
                                    @php
                                        $progress = ($post->current_amount / $post->goal_amount) * 100;
                                        @endphp
                                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $progress }}%;"></div>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">
                                    Rp {{ number_format($post->current_amount, 0, ',', '.') }} terkumpul dari 
                                    Rp {{ number_format($post->goal_amount, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>


                        <!-- Button Section -->
                        <div class="p-4">
                            <a href="{{ route('posts.show', $post->id) }}" 
                            class="w-full bg-black text-white text-center py-2 rounded-lg block">
                                Donasi Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- Riwayat Donasi --}}
<div id="riwayatDonasi" class="space-y-4 w-12/12 mx-auto my-5">
    <h1 class="text-3xl font-semibold">Riwayat Donatur</h1>
    @if ($donators->isEmpty())
        <p class="text-center text-gray-500">Belum ada donatur.</p>
    @else
        @foreach ($donators as $donator)
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center space-x-4 border-gray-500 border">
                <!-- Icon -->
                <img src="{{ asset('images/icons/ikonrupiah.png') }}" 
                    alt="Ikon Rupiah" 
                    class="w-16 h-16 object-contain">
                
                <!-- Details -->
                <div class="">
                    <p class="font-semibold text-gray-800">{{ ucwords($donator->user->username ?? 'Anonim') }} <span class="font-normal text-gray-400">| {{ $donator->created_at->diffForHumans() }}</span></p>
                    <p class="text-green-600 font-bold">
                        Rp {{ number_format($donator->total_donasi, 0, ',', '.') }}
                        <span class="text-gray-500 font-normal"> • Via {{ $donator->tipe_bayar }}</span>
                    </p>
                    <p class="text-gray-600 text-sm mt-1">{{ $donator->pesan ?? '' }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
{{-- /Riwayat Donasi --}}

@if (session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded">
        {{ session('success') }}
    </div>
@endif
@endsection



@section('script')
{{-- <script>
    // Function to show the modal with a dynamic message
    function showNotificationModal(title, message) {
        const modal = document.getElementById('notificationModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalMessage = document.getElementById('modalMessage');

        modalTitle.textContent = title || 'Notification';
        modalMessage.textContent = message || 'This is a notification message.';
        modal.classList.remove('hidden');
    }

    // Close button functionality
    document.getElementById('closeModalButton').addEventListener('click', function () {
        document.getElementById('notificationModal').classList.add('hidden');
    });
</script> --}}
@endsection