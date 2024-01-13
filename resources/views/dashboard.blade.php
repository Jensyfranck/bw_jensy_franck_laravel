<x-app-layout>
        @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Post Creation Form -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 p-6">
                    <form method="POST" action="{{ route('posts.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-1">Title:</label>
                            <input type="text" id="title" name="title" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label for="message" class="block text-gray-700 text-sm font-bold mb-1">Message:</label>
                            <textarea id="message" name="message" rows="4" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Post</button>
                    </form>
                </div>

                <!-- Display Posts -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        @forelse($posts as $post)
                            <div class="mb-8 p-4 border border-gray-200 rounded-lg">
                                <div class="font-bold text-lg mb-1">{{ $post->user->name }} ({{ $post->created_at->format('M d, Y') }})</div>
                                <div class="text-xl mb-2">{{ $post->title }}</div>
                                <p class="mb-4">{{ $post->message }}</p>

                                <!-- Comments Section -->
                                <div class="pl-4 mt-4 border-l-4 border-gray-200">
                                    @foreach($post->comments as $comment)
                                        <div class="mb-2">
                                            <strong>{{ $comment->user->name }}:</strong>
                                            <p>{{ $comment->message }}</p>
                                        </div>
                                    @endforeach

                                    <!-- Add a comment form -->
                                    <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                                        @csrf
                                        <textarea name="message" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required placeholder="Add a comment..."></textarea>
                                        <button type="submit" class="mt-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Add Comment</button>
                                    </form>
                                </div>

                                <!-- Like Button -->
                                <form method="POST" action="{{ route('posts.likes.store', $post) }}" class="mt-4">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        <span>👍 Likes ({{ $post->likes->count() }})</span>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-700">No posts available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
