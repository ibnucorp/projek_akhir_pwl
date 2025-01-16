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
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                         @method('PUT')
                        <div class="mb-4">
                            <img src="{{ asset('images/donasi/'.$post->image_url.'.png') }}" alt="Image" class="w-64 object-cover h-full">
                        </div>
                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-lg font-medium mb-1">Title</label>
                            <input type="text" id="title" name="title" class="w-full border rounded-lg p-2" placeholder="Enter the title" required value="{{ $post->title }}">
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-lg font-medium mb-1">Description</label>
                            <textarea id="description" name="description" class="w-full border rounded-lg p-2" rows="4" placeholder="Enter the description" required>{{ $post->description }}</textarea>
                        </div>

                        <!-- Image URL -->
                        <div class="mb-4">
                            <label for="image_url" class="block text-lg font-medium mb-1">Image URL</label>
                            <input type="text" id="image_url" name="image_url" class="w-full border rounded-lg p-2" placeholder="Enter the image URL" required value="{{ $post->image_url }}">
                        </div>

                        <!-- Goal Amount -->
                        <div class="mb-4">
                            <label for="goal_amount" class="block text-lg font-medium mb-1">Goal Amount</label>
                            <input type="number" id="goal_amount" name="goal_amount" class="w-full border rounded-lg p-2" placeholder="Enter the goal amount (e.g., 1000000)" required value="{{ $post->goal_amount }}">
                        </div>

                        <!-- Current Amount -->
                        <div class="mb-4">
                            <label for="current_amount" class="block text-lg font-medium mb-1">Current Amount</label>
                            <input type="number" id="current_amount" name="current_amount" class="w-full border rounded-lg p-2" placeholder="Enter the current amount (default 0)" value="{{ $post->current_amount }}">
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-lg font-medium mb-1">Status</label>
                            <select id="status" name="status" class="w-full border rounded-lg p-2" required>
                                <option value="active" {{ old('status', $post->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="completed" {{ old('status', $post->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="inactive" {{ old('status', $post->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
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