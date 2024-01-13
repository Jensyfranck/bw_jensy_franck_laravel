@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 my-4">Create News Item</h1>
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Cover Image -->
            <div>
                <label for="cover_image" class="block text-gray-700 text-sm font-bold mb-2">Cover Image</label>
                <input type="file" id="cover_image" name="cover_image" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Content -->
            <div>
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea id="message" name="message" rows="6" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>

            <!-- Publish Date -->
            <div>
                <label for="published_at" class="block text-gray-700 text-sm font-bold mb-2">Publish Date</label>
                <input type="date" id="published_at" name="published_at" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Publish News</button>
        </form>
    </div>
@endsection
