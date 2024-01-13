@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 my-4">FAQ</h1>

        @if(Auth::check() && Auth::user()->is_admin)
            <a href="{{ route('faqs-categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Create FAQ Category</a>
            <a href="{{ route('faqs-items.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create FAQ Item</a>
        @endif

        @foreach ($faqCategories as $category)
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">{{ $category->name }}</h2>

                @if(Auth::check() && Auth::user()->is_admin)
                    <a href="{{ route('faqs-categories.edit', $category->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-sm">Edit</a>
                    <form action="{{ route('faqs-categories.destroy', $category->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm ml-2">Delete</button>
                    </form>
                @endif

                @foreach ($category->faqItems as $item)
                    <div class="mt-4 pl-4 border-l-4 border-gray-200">
                        <p class="font-bold">{{ $item->question }}</p>
                        <p class="text-gray-700">{{ $item->answer }}</p>

                        @if(Auth::check() && Auth::user()->is_admin)
                            <a href="{{ route('faqs-items.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-sm">Edit</a>
                            <form action="{{ route('faqs-items.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm ml-2">Delete</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
