@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 my-4">Contact Us</h1>

        {{-- Contact Form --}}
        <form id="contact-form" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @csrf

            {{-- Name Field --}}
            <div class="mb-4">
                <label for="user_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="user_name" name="user_name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            {{-- Email Field --}}
            <div class="mb-4">
                <label for="user_email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="user_email" name="user_email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            {{-- Message Field --}}
            <div class="mb-4">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                <textarea id="message" name="message" rows="4" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send Message</button>
        </form>
    </div>

    {{-- EmailJS Integration --}}
    <script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("70v7k5hesT77O74Yf"); // Left the keys hardcoded so you can send the mails.
        })();

        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault();

            emailjs.sendForm('service_uugb1un', 'template_xfd35pk', this) // Left the keys hardcoded so you can send the mails.
                .then(function() {
                    alert('Message sent successfully! Redirecting to dashboard...');
                    window.location.href = '/dashboard';
                }, function(error) {
                    alert('Failed to send the message, please try again.');
                });
        });
    </script>
@endsection
