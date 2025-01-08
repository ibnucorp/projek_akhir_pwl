@extends('layouts.layout')

@section('content')
<x-banner/>
<x-navbar/>
<x-card/>
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