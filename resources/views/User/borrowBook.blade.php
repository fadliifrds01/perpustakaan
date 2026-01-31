<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku | Perpustakaan Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-50 flex min-h-screen font-sans antialiased text-gray-900">

    {{-- ================= SIDEBAR ================= --}}
    @include('Components.mainMenu');
    {{-- =========================================== --}}


    {{-- MAIN CONTENT --}}
    <main class="flex-1 ml-64 p-12">

        <header class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">
                    Pinjaman Aktif 📖
                </h1>
                <p class="text-gray-500 mt-1">Kelola buku yang sedang Anda pinjam saat ini.</p>
            </div>
        </header>

        <!-- UNTK MENAMPILKAN PESAN ERROR/SUKSES -->
        @include('Components.alerts')

        <section class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100 text-center">
                            <th
                                class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">
                                Buku</th>
                            <th
                                class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">
                                Judul Buku</th>
                            <th
                                class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">
                                Tanggal Pinjam</th>
                            <th
                                class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">
                                Status</th>
                            <th
                                class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($borrowedBooks as $borrowedBook)
                        <tr class="group hover:bg-gray-50/50 transition-all duration-200">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-16 bg-blue-50 rounded-lg flex items-center justify-center border border-blue-100 group-hover:scale-105 transition-transform">
                                        <img src="{{ asset($borrowedBook->book->cover_buku) }}" alt="Cover Buku"
                                            class="object-cover w-15 h-15 rounded-sm shadow">
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="font-bold text-gray-800 text-base leading-tight">{{ $borrowedBook->book->judul_buku }}</p>
                            </td>
                            <td class="px-8 py-6 text-sm text-gray-600 font-medium tracking-tight">{{ $borrowedBook->tanggal_pinjam }}</td>
                            <td class="px-8 py-6">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[11px] font-black uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    {{ $borrowedBook->book->status }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <form action="{{ route('Admin.Transaction.returnBook', $borrowedBook->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="book_id" value="{{ $borrowedBook->book_id }}">
                                    <button
                                        class="px-4 py-2 bg-white border border-gray-200 hover:border-blue-500 hover:text-blue-600 text-gray-600 text-sm font-bold rounded-xl transition-all shadow-sm"
                                        onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                        Kembalikan
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <!-- Tampilan jika buku KOSONG -->
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <i class="ph ph-folder-open text-4xl mb-2"></i>
                                        <p>Tidak ada buku yang sedang kamu pindam.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </main>

</body>

</html>
