@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">About This Project</h1>

        <div class="bg-white p-6 border border-gray-200 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-gray-800">Project Name</h2>
            <p class="text-gray-600 text-sm mb-4">Backend Web Laravel Project</p>

            <h2 class="text-xl font-semibold text-gray-800 mt-4">Description</h2>
            <p class="text-gray-600 text-sm mb-4">
                This project is a comprehensive web application built using Laravel. It includes features like user authentication, news management, FAQs, and user profiles. It's designed to provide a seamless experience for both regular users and administrators, encompassing functionalities such as post creation, comments, and admin-specific capabilities like user promotion.
            </p>

            <h2 class="text-xl font-semibold text-gray-800 mt-4">Features</h2>
            <ul class="list-disc pl-5 text-gray-600 mb-4">
                <li>User Authentication: Login, registration, and password management.</li>
                <li>User Profiles: Public profiles with editable personal information.</li>
                <li>News Management: Admins can create, edit, delete news posts. All users can view them.</li>
                <li>FAQ Section: Manageable FAQ categories and items.</li>
                <li>Posts and Comments: Users can create posts and leave comments.</li>
                <li>Admin Features: Admins can promote users and manage content.</li>
            </ul>

            <h2 class="text-xl font-semibold text-gray-800 mt-4">Repository</h2>
            <p class="text-gray-600 text-sm mb-4">
                Visit our GitHub repository: <a href="https://github.com/Jensyfranck/bw_jensy_franck_laravel" class="text-indigo-600 hover:underline">https://github.com/Jensyfranck/bw_jensy_franck_laravel</a>
            </p>

            <h2 class="text-xl font-semibold text-gray-800 mt-6">Citations</h2>
            <ul class="list-disc pl-5 mt-4 text-gray-600">
                <li><a href="https://laravel.com/docs" class="text-indigo-600 hover:underline">Laravel Documentation</a></li>
                <li><a href="https://tailwindcss.com" class="text-indigo-600 hover:underline">Tailwind CSS</a></li>
                <li><a href="https://stackoverflow.com/" class="text-indigo-600 hover:underline">StackOverflow</a></li>
                <li><a href="https://chat.openai.com/" class="text-indigo-600 hover:underline">Open AI</a></li>
            </ul>
        </div>
    </div>
@endsection
