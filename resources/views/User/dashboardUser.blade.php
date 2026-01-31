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

    {{-- ================= SIDEBAR ================= --}}
    @include('Components.mainMenu');
    {{-- =========================================== --}}

    {{-- MAIN CONTENT --}}
    <main class="flex-1 ml-64 p-10">

        <header class="mb-10">
            <h1 class="text-3xl font-extrabold text-gray-800">
                📚 Daftar Buku
            </h1>
            <p class="text-gray-500 mt-1">Temukan buku favoritmu dan mulai membaca hari ini.</p>
        </header>

        <!-- UNTK MENAMPILKAN PESAN ERROR/SUKSES -->
        @include('Components.alerts')
  
        {{-- Grid Buku --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @forelse ($books as $book)
                <!-- Tampilan jika buku ADA -->
                {{-- Card Utama --}}
                <div
                    class="group bg-white p-4 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-300">

                    {{-- Area Tampilan Buku (Bentuk Sempurna) --}}
                    <div
                        class="relative w-full aspect-[3/4] bg-gray-50 rounded-2xl overflow-hidden flex items-center justify-center p-4">
                        {{-- Efek Bayangan Rak --}}
                        <div class="absolute bottom-0 w-full h-8 bg-gradient-to-t from-gray-200/50 to-transparent">
                        </div>

                        <img src="{{ asset( $book->cover_buku) }}" alt="{{ $book->judul_buku }}"
                            class="max-w-full max-h-full object-contain shadow-[10px_10px_20px_rgba(0,0,0,0.2)] group-hover:scale-105 transition-transform duration-500">
                    </div>

                    {{-- Detail & Button di dalam Card --}}
                    <div class="mt-5 px-2 pb-2">
                        <h3
                            class="text-lg font-bold text-gray-800 line-clamp-1 group-hover:text-blue-600 transition-colors">
                            {{ $book->judul_buku }}
                        </h3>
                        <p class="text-sm text-gray-400 mb-5">Tersedia untuk dipinjam</p>

                        {{-- Tombol Modern --}}
                        <form action="{{ route('Admin.Transaction.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-2xl shadow-lg shadow-blue-100 flex items-center justify-center gap-2 transition-all active:scale-95"
                                onclick="return confirm('Yakin ingin meminjam buku ini?')">
                                Pinjam Buku
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <!-- Tampilan jika buku KOSONG -->
                <div class="col-span-full flex flex-col items-center justify-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                    <i class="ph ph-books text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-500">Wah, buku tidak ditemukan!</h3>
                    <p class="text-gray-400">Saat ini tidak ada buku yang berstatus Tersedia.</p>
                </div>
            @endforelse
        </div>


    </main>

</body>

</html>
