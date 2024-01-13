@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 my-4">News</h1>

        {{-- "Create News Item" Button --}}
        @if(Auth::check() && Auth::user()->is_admin)
            <a href="{{ route('news.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create News Item</a>
        @endif

        @foreach ($newsItems as $newsItem)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $newsItem->title }}</h2>
                <p class="text-gray-700 mb-3">{{ $newsItem->message }}</p>
                @if($newsItem->cover_image)
                    <img src="{{ asset('storage/' . $newsItem->cover_image) }}" alt="Cover Image" class="mb-3 max-w-full h-auto rounded-md">
                @endif

                @if(Auth::user()->is_admin)
                    <a href="{{ route('news.edit', $newsItem->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                    <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
