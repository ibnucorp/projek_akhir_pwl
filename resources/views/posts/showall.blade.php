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
                                        <a href="{{ route('posts.show', $post->id) }}" class="py-2 px-4 bg-blue-600 rounded-md">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="py-2 px-4 bg-yellow-600 rounded-md">Edit</a>
                                        {{-- <a href="{{ route('posts.delete', $post->id) }}" class="py-2 px-4 bg-yellow-600 rounded-md">Edit</a> --}}
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
