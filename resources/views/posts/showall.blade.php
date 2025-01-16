<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 p-2">ID</th>
                                <th class="border border-gray-300 p-2">Title</th>
                                <th class="border border-gray-300 p-2">Status</th>
                                <th class="border border-gray-300 p-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $post->id }}</td>
                                    <td class="border border-gray-300 p-2">{{ $post->title }}</td>
                                    <td class="border border-gray-300 p-2">{{ $post->status }}</td>
                                    <td class="border border-gray-300 p-2 text-white">
                                        {{-- View Button --}}
                                        <button class="py-2 px-4 bg-blue-600 rounded-md">
                                            <a href="{{ route('posts.show', $post->id) }}">View</a>
                                        </button>
                                        {{-- /View button --}}
                                        {{-- Edit Button --}}
                                        <button class="py-2 px-4 bg-yellow-600 rounded-md">
                                            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                        </button>
                                        {{-- /Edit Button  --}}
                                        {{-- Toggle Active Button --}}
                                        <form action="{{ route('posts.toggleStatus', $post->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="py-2 px-4 {{ $post->status === 'active' ? 'bg-orange-500' : 'bg-green-600' }} text-white rounded-md">
                                                {{ $post->status === 'active' ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                        {{-- /Toggle Active Button --}}
                                        {{-- Delete Button --}}
                                        <form action="{{ route('posts.delete', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="py-2 px-4 bg-red-600 text-white rounded-md">Delete</button>
                                        </form>
                                        {{-- /Delete Button --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
