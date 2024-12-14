@extends('layout.app')

@section('content')
<div class="flex flex-col items-center p-6">
    <!-- Navigasi untuk Scroll -->
    <div class="w-full flex justify-around mb-8">
        <a href="#home" class="text-lg font-semibold hover:text-[#88827A] transition duration-300">Home</a>
        <a href="#dashboard" class="text-lg font-semibold hover:text-[#88827A] transition duration-300">Dashboard</a>
    </div>

    <!-- Bagian Home -->
    <section id="home" class="w-full min-h-screen flex items-center justify-center bg-gray-100">
        <div class="text-center p-6">
            <h2 class="text-3xl font-bold mb-4">Welcome to Home Page</h2>
            <p>This is the home section of the website.</p>
        </div>
    </section>

    <!-- Bagian Dashboard -->
    <section id="dashboard" class="w-full min-h-screen flex items-center justify-center bg-[#F6F6D9]">
        <div class="text-center p-6">
            <h2 class="text-3xl font-bold mb-4">Dashboard</h2>
            <p>Here is your dashboard overview.</p>
        </div>
    </section>
</div>
@endsection
