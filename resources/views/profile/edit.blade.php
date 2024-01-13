<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Profile</h1>
        <form action="{{ route('user.update-profile') }}" method="POST" enctype="multipart/form-data" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="birthday" class="block text-gray-700 text-sm font-bold mb-2">Birthday</label>
                <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="avatar" class="block text-gray-700 text-sm font-bold mb-2">Avatar</label>
                <input type="file" id="avatar" name="avatar" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <label for="biography" class="block text-gray-700 text-sm font-bold mb-2">About Me</label>
                <textarea id="biography" name="biography" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('biography', $user->biography) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Changes</button>
        </form>
    </div>
    @endsection
</x-app-layout>
