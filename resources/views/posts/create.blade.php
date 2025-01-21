<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <h2 class="text-2xl font-bold mb-6">Create a New Donation Post</h2>
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block text-lg font-medium mb-1">Title</label>
            <input type="text" id="title" name="title" class="w-full border rounded-lg p-2" placeholder="Enter the title" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-lg font-medium mb-1">Description</label>
            <textarea id="description" name="description" class="w-full border rounded-lg p-2" rows="4" placeholder="Enter the description" required></textarea>
        </div>

        <!-- Image File -->
        <div class="mb-4">
            <label for="image_file" class="block text-lg font-medium mb-1">Image File</label>
            <input type="file" id="image_file" name="image_file" class="w-full border rounded-lg p-2" required>
        </div>

        <!-- Goal Amount -->
        <div class="mb-4">
            <label for="goal_amount" class="block text-lg font-medium mb-1">Goal Amount</label>
            <input type="number" id="goal_amount" name="goal_amount" class="w-full border rounded-lg p-2" placeholder="Enter the goal amount (e.g., 1000000)" required>
        </div>

        <!-- Current Amount -->
        <div class="mb-4">
            <label for="current_amount" class="block text-lg font-medium mb-1">Current Amount</label>
            <input type="number" id="current_amount" name="current_amount" class="w-full border rounded-lg p-2" placeholder="Enter the current amount (default 0)" value="0">
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="block text-lg font-medium mb-1">Status</label>
            <select id="status" name="status" class="w-full border rounded-lg p-2" required>
                <option value="active">Active</option>
                <option value="completed">Completed</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                Submit
            </button>
        </div>
    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
