@extends('layout.app', ['title' => 'Pengaduan Masyarakat'])

@section('content')
    <div class="flex flex-col items-center justify-center h-screen bg-gradient-to-b from-[#F6F6D9] to-[#E8E8C1]">
        <h1 class="text-5xl font-extrabold text-[#333] mb-6 text-center">
            Selamat Datang di <span class="text-green-600">Sistem Pengaduan Masyarakat</span>
        </h1>
        <p class="text-lg text-[#555] mb-8 text-center max-w-2xl">
            Laporkan keluhan Anda dengan mudah dan cepat. Kami berkomitmen untuk membantu menyelesaikan masalah Anda secara
            transparan dan efisien.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            @auth
                <a href=""
                    class="inline-flex items-center justify-center bg-green-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-green-600 hover:shadow-xl transition transform hover:scale-105">
                    Masuk ke Dashboard
                </a>
            @else
                <a href=""
                    class="inline-flex items-center justify-center bg-blue-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-blue-600 hover:shadow-xl transition transform hover:scale-105">
                    Login
                </a>
                <a href=""
                    class="inline-flex items-center justify-center bg-gray-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-gray-600 hover:shadow-xl transition transform hover:scale-105">
                    Register
                </a>
            @endauth
        </div>
    </div>
@endsection
