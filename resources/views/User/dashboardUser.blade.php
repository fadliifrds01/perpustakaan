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

    @include('Components.mainMenuUser')
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

            {{-- Card Buku 1 --}}
            <div
                class="group bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-full h-64 overflow-hidden rounded-xl mb-4 bg-gray-200">
                    <img src="https://via.placeholder.com/300x400" alt="Cover Buku Laravel"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Laravel Dasar
                </h3>
                <p class="text-sm text-gray-400 mb-4">Belajar Framework PHP paling populer di dunia.</p>

                <button
                    class="w-full bg-gray-900 hover:bg-blue-600 text-white font-medium py-3 rounded-xl transition-colors">
                    Pinjam Sekarang
                </button>
            </div>

            {{-- Card Buku 2 --}}
            <div
                class="group bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-full h-64 overflow-hidden rounded-xl mb-4 bg-gray-200">
                    <img src="https://via.placeholder.com/300x400" alt="Cover Buku JS"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">JavaScript
                    Pemula</h3>
                <p class="text-sm text-gray-400 mb-4">Logika dasar pemrograman web interaktif.</p>

                <button
                    class="w-full bg-gray-900 hover:bg-blue-600 text-white font-medium py-3 rounded-xl transition-colors">
                    Pinjam Sekarang
                </button>
            </div>

            {{-- Card Buku 3 --}}
            <div
                class="group bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-full h-64 overflow-hidden rounded-xl mb-4 bg-gray-200">
                    <img src="https://via.placeholder.com/300x400" alt="Cover Buku Tailwind"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Tailwind CSS
                </h3>
                <p class="text-sm text-gray-400 mb-4">Cara modern mendesain website dengan cepat.</p>

                <button
                    class="w-full bg-gray-900 hover:bg-blue-600 text-white font-medium py-3 rounded-xl transition-colors">
                    Pinjam Sekarang
                </button>
            </div>

        </div>

    </main>

</body>

</html>
