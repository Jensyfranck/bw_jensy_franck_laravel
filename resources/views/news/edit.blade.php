@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 my-4">Edit News</h1>
        <form action="{{ route('news.update', $newsItem->id) }}" method="POST" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ $newsItem->title }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea id="message" name="message" rows="4" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">{{ $newsItem->message }}</textarea>
            </div>

            <!-- Photo Upload -->
            <div class="mb-4">
                <label for="cover_image" class="block text-gray-700 text-sm font-bold mb-2">Cover Image</label>
                <input type="file" id="cover_image" name="cover_image" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline
">Update</button>
        </form>

    </div>
@endsection
