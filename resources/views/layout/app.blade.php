<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pengaduan Masyarakat' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Sidebar Animasi */
        .sidebar {
            width: 5rem; /* Lebar awal sidebar */
            transition: width 0.3s ease;
        }

        .sidebar:hover {
            width: 16rem; /* Lebar penuh saat di-hover */
        }

        /* Teks tersembunyi saat tidak di-hover */
        .sidebar ul li span.text {
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateX(-10px);
        }

        .sidebar:hover ul li span.text {
            opacity: 1;
            transform: translateX(0);
        }

        /* Flex layout for sidebar and content */
        .layout-container {
            display: flex;
            flex-direction: row;
            min-height: 100vh; /* Agar selalu penuh layar */
        }

        .main-content {
            flex: 1; /* Isi sisa ruang */
            margin-left: 5rem; /* Margin sesuai lebar sidebar */
            transition: margin-left 0.3s ease;
        }

        .sidebar:hover ~ .main-content {
            margin-left: 16rem; /* Geser sesuai lebar penuh sidebar */
        }
    </style>
</head>
<body class="bg-[#F6F6D9]"> <!-- Warna latar utama -->
    <div class="layout-container">
        <!-- Sidebar -->
        <nav class="sidebar h-screen bg-[#B2B097] text-white fixed overflow-hidden">
            <div class="py-6 px-4">
                <!-- Header Sidebar -->
                <h1 class="text-xl font-bold whitespace-nowrap overflow-hidden">
                    Pengaduan Masyarakat
                </h1>
                <ul class="mt-6 space-y-4">
                    <!-- Menu Item 1 -->
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-[#88827A] rounded-lg">
                            <span class="material-icons">home</span>
                            <span class="text whitespace-nowrap">Home</span>
                        </a>
                    </li>
                    <!-- Menu Item 2 -->
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-[#88827A] rounded-lg">
                            <span class="material-icons">dashboard</span>
                            <span class="text whitespace-nowrap">Dashboard</span>
                        </a>
                    </li>
                    <!-- Menu Item 3 -->
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-[#88827A] rounded-lg">
                            <span class="material-icons">report</span>
                            <span class="text whitespace-nowrap">Reports</span>
                        </a>
                    </li>
                    <!-- Menu Item 4 -->
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-600 rounded-lg transition duration-200">
                            <span class="material-icons text-white">donut_large</span>
                            <span class="text whitespace-nowrap">Status</span>
                        </a>
                    </li>
                    <!-- Conditional Login/Register or Logout -->
                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-600 rounded-lg transition duration-200">
                                <span class="material-icons text-white">login</span>
                                <span class="text whitespace-nowrap">Login</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-600 rounded-lg transition duration-200">
                                <span class="material-icons text-white">person_add</span>
                                <span class="text whitespace-nowrap">Register</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-600 rounded-lg transition duration-200">
                                <span class="material-icons text-white">logout</span>
                                <span class="text whitespace-nowrap">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content p-6">
            @yield('content')
        </main>
    </div>

    <!-- Add Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>
</html>
