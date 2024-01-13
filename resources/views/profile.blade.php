<x-app-layout>

    @section('content')
        <div class="container mx-auto px-4">
            <div class="text-center my-6">
                <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                    {{ $user->name }}'s Profile
                </h2>
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}'s Avatar" class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full inline-block mt-4">
                <p class="text-gray-600 mt-2">Birthday: {{ $user->birthday ? $user->birthday->format('d-m-Y') : 'Not set' }}</p>
                <p class="text-gray-600">About Me: {{ $user->biography }}</p>
                <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4 inline-block">Edit Profile</a>
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">{{ $user->name }}'s Posts</h3>

            <ul>
                @forelse ($user->posts as $post)
                    <li class="mb-6">
                        <h4 class="text-lg font-semibold">{{ $post->title }}</h4>
                        <p class="text-gray-600">{{ $post->message }}</p>
                        <div class="flex space-x-4 mt-2">
                            <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">Edit</a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                        <h3 class="text-md font-semibold mt-4">Comments:</h3>
                        @foreach($post->comments as $comment)
                            <div class="pl-4 mt-2 border-l-4 border-gray-200">
                                <strong>{{ $comment->user->name }}:</strong>
                                <p>{{ $comment->message }}</p>
                            </div>
                        @endforeach

                        {{-- Add a comment form --}}
                        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                            @csrf
                            <textarea name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-sm mt-2">Add Comment</button>
                        </form>
                        <hr class="my-4">
                    </li>
                @empty
                    <p class="text-gray-600">No posts to display.</p>
                @endforelse
            </ul>
        </div>
    @endsection

</x-app-layout>
