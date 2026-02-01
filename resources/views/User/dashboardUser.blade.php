<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Perpustakaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-50 min-h-screen flex">

    {{-- ================= SIDEBAR ================= --}}
    @include('Components.mainMenu')
    {{-- =========================================== --}}

    {{-- MAIN CONTENT --}}
    <main class="flex-1 w-full lg:ml-64 p-4 sm:p-6 lg:p-10">

        <header class="mb-6 lg:mb-10 mt-20 md:mt-0">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-800">
                📚 Daftar Buku
            </h1>
            <p class="text-gray-500 text-sm mt-1">
                Temukan buku favoritmu dan mulai membaca hari ini.
            </p>
        </header>

        @include('Components.alerts')

        {{-- GRID RESPONSIVE (rapi di semua device) --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">

            @forelse ($books as $book)
                <div class="group bg-white p-3 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">

                    {{-- Cover --}}
                    <div
                        class="relative w-full aspect-[3/4] bg-gray-50 rounded-xl flex items-center justify-center overflow-hidden">
                        <img src="{{ asset($book->cover_buku) }}" alt="{{ $book->judul_buku }}"
                            class="object-contain max-h-full group-hover:scale-105 transition">
                    </div>

                    {{-- Detail --}}
                    <div class="mt-3">
                        <h3 class="text-sm font-bold line-clamp-1 text-gray-800 group-hover:text-blue-600">
                            {{ $book->judul_buku }}
                        </h3>

                        <p class="text-xs text-gray-400 mb-3">
                            Tersedia untuk dipinjam
                        </p>

                        <form action="{{ route('Admin.Transaction.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">

                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold py-2 rounded-lg transition"
                                onclick="return confirm('Yakin ingin meminjam buku ini?')">
                                Pinjam
                            </button>
                        </form>
                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-16 text-gray-400">
                    Buku tidak ditemukan
                </div>
            @endforelse

        </div>

    </main>

</body>

</html>
