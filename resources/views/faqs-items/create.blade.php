@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 my-4">Create FAQ Item</h1>

        {{-- Display any success or error messages --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FAQ Item Creation Form --}}
        <form method="POST" action="{{ route('faqs-items.store') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @csrf

            {{-- Category Selection --}}
            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">FAQ Category</label>
                <select id="category" name="f_a_q_category_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Question --}}
            <div class="mb-4">
                <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Question</label>
                <input type="text" id="question" name="question" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            {{-- Answer --}}
            <div class="mb-4">
                <label for="answer" class="block text-gray-700 text-sm font-bold mb-2">Answer</label>
                <textarea id="answer" name="answer" rows="3" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create FAQ Item</button>
        </form>
    </div>
@endsection
