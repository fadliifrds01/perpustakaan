<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-100">

    {{-- ================= NAVBAR ================= --}}
    <nav class="bg-white shadow-md px-8 py-4 flex items-center justify-between">
        <h2 class="text-lg font-bold text-blue-600 italic">
            Perpustakaan
        </h2>

        <div class="flex gap-8 font-medium text-gray-600">

            <a href="{{ route('User.dashboard') }}" class="hover:text-blue-600">
                Daftar Buku
            </a>

            <a href="#" class="hover:text-blue-600">
                Pinjam Buku
            </a>

            <a href="#" class="hover:text-blue-600">
                History
            </a>

        </div>

        <form action="{{ route('Auth.logout') }}" method="POST">
            @csrf
            <button class="flex items-center text-red-500 hover:text-red-700 font-medium">
                <i class="ph ph-sign-out mr-2"></i>
                Logout
            </button>
        </form>


    </nav>
    {{-- =========================================== --}}


    {{-- CONTENT --}}
    <main class="max-w-6xl mx-auto p-8">

        <h1 class="text-2xl font-bold mb-6">
            📚 Daftar Buku
        </h1>


        {{-- Contoh list buku statis --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white p-5 rounded-xl shadow">
                <h3 class="font-semibold">Laravel Dasar</h3>
                <button class="mt-3 w-full bg-blue-600 text-white py-2 rounded-lg">
                    Pinjam
                </button>
            </div>

            <div class="bg-white p-5 rounded-xl shadow">
                <h3 class="font-semibold">JavaScript Pemula</h3>
                <button class="mt-3 w-full bg-blue-600 text-white py-2 rounded-lg">
                    Pinjam
                </button>
            </div>

            <div class="bg-white p-5 rounded-xl shadow">
                <h3 class="font-semibold">Tailwind CSS</h3>
                <button class="mt-3 w-full bg-blue-600 text-white py-2 rounded-lg">
                    Pinjam
                </button>
            </div>

        </div>

    </main>

</body>

</html>
