<!-- Modal -->
<div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <!-- Modal Header -->
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-900">Success</h3>
            <button id="closeModalButton" class="text-gray-500 hover:text-gray-700">
                &times;
            </button>
        </div>
        <!-- Modal Body -->
        <div class="mt-4">
            <p id="modalMessage" class="text-gray-700">Your operation was successful!</p>
        </div>
        <!-- Modal Footer -->
        <div class="mt-6 flex justify-end">
            <button id="modalCloseButton" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Close
            </button>
        </div>
    </div>
</div>

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
