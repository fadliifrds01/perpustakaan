<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Perpustakaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-50 flex min-h-screen">

    @include('Components.mainMenuUser');
    {{-- =========================================== --}}

    {{-- MAIN CONTENT --}}
    <main class="flex-1 ml-64 p-10">

        <header class="mb-10">
            <h1 class="text-3xl font-extrabold text-gray-800">
                📚 Daftar Buku
            </h1>
            <p class="text-gray-500 mt-1">Temukan buku favoritmu dan mulai membaca hari ini.</p>
        </header>

        {{-- Grid Buku --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Card Buku --}}
            <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-full h-40 bg-blue-100 rounded-lg mb-4 flex items-center justify-center">
                    <i class="ph ph-code text-5xl text-blue-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Laravel Dasar</h3>
                <p class="text-sm text-gray-400 mb-4">Belajar Framework PHP paling populer di dunia.</p>
                <button class="w-full bg-gray-900 hover:bg-blue-600 text-white font-medium py-3 rounded-xl transition-colors">
                    Pinjam Sekarang
                </button>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-full h-40 bg-yellow-100 rounded-lg mb-4 flex items-center justify-center">
                    <i class="ph ph-scroll text-5xl text-yellow-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">JavaScript Pemula</h3>
                <p class="text-sm text-gray-400 mb-4">Logika dasar pemrograman web interaktif.</p>
                <button class="w-full bg-gray-900 hover:bg-blue-600 text-white font-medium py-3 rounded-xl transition-colors">
                    Pinjam Sekarang
                </button>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-full h-40 bg-indigo-100 rounded-lg mb-4 flex items-center justify-center">
                    <i class="ph ph-palette text-5xl text-indigo-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Tailwind CSS</h3>
                <p class="text-sm text-gray-400 mb-4">Cara modern mendesain website dengan cepat.</p>
                <button class="w-full bg-gray-900 hover:bg-blue-600 text-white font-medium py-3 rounded-xl transition-colors">
                    Pinjam Sekarang
                </button>
            </div>

        </div>

    </main>

</body>
</html>
