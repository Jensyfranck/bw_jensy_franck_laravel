<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Our Website</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="flex flex-col items-center justify-center min-h-screen">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Welcome!</h1>
    <p class="text-xl text-gray-600 mb-8 text-center max-w-md">Login or register to come in.</p>

    @if (Route::has('login'))
        <div class="space-x-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="bg-blue-500 text-white font-bold py-2 px-6 rounded hover:bg-blue-700">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="bg-green-500 text-white font-bold py-2 px-6 rounded hover:bg-green-700">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-purple-500 text-white font-bold py-2 px-6 rounded hover:bg-purple-700">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<footer class="text-center py-4 absolute bottom-0 w-full">
    <p class="text-gray-600 text-sm">&copy; {{ date('Y') }} Jensy Franck</p>
</footer>
</body>
</html>
