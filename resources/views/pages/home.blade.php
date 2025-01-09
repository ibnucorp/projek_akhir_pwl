@extends('layouts.layout')

@section('content')
<x-banner/>
<x-navbar/>

    <div class="cards">
        <div class="flex flex-wrap justify-center gap-6 p-6">
        <!-- Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div class="w-64 bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="images/donasi/{{ $post->image_url }}.png" alt="Image" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-bold">{{ $post->title }}</h2>
                            <p class="text-sm text-gray-600 mt-2">
                                {{ $post->description }}
                            </p>
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
                            <button class="mt-4 w-full bg-black text-white py-2 rounded-lg">
                                Donasi Sekarang
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


<x-modal/>
@endsection



@section('script')
<script>
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
</script>
@endsection