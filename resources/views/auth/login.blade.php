@extends('layout.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-50 to-blue-100">
    <!-- Left Illustration -->
    <div class="hidden md:flex w-1/2 h-full items-center justify-center">
        <img src="{{ asset('images/padlock.png') }}" alt="Padlock" class="w-3/4">
    </div>

    <!-- Right Login Form -->
    <div class="w-full md:w-1/2 px-6 lg:px-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h3 class="text-2xl font-bold text-center mb-6 text-gray-700">Welcome to the Application</h3>
            <p class="text-sm text-center text-gray-500 mb-6">
                Please login or register to access the platform.
            </p>
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                        placeholder="Enter your email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                        placeholder="Enter your password" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Submit Button -->
                <button type="submit" class="w-full py-2 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 transition">
                    Sign In
                </button>
            </form>




            <!-- Register Link -->
            <p class="text-center text-gray-500 mt-6">
                New to the Application? <a href="{{ route('register') }}" class="text-green-500 hover:underline">Create an account</a>.
            </p>
        </div>
    </div>
</div>
@endsection