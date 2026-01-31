<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman | Perpustakaan Digital</title>

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
                    Riwayat Peminjaman 📜
                </h1>
                <p class="text-gray-500 mt-1">Daftar buku yang sudah Anda selesaikan.</p>
            </div>
        </header>

        <section class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100 text-center">
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Buku</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Judul Buku</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Tgl Pinjam</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Tgl Kembali</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        {{-- Baris Riwayat --}}
                        @forelse ($historyBorroweds as $historyBorrowed)
                        <tr class="group hover:bg-gray-50/50 transition-all duration-200">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-16 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200 group-hover:bg-blue-50 group-hover:border-blue-100 transition-colors">
                                        <img src="{{ asset($historyBorrowed->book->cover_buku) }}" alt="Cover Buku"
                                            class="object-cover w-15 h-15 rounded-sm shadow">
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="font-bold text-gray-800 text-base leading-tight">{{ $historyBorrowed->book->judul_buku }}</p>
                            <td class="px-8 py-6 text-sm text-gray-500 font-medium tracking-tight">{{ $historyBorrowed->tanggal_pinjam }}</td>
                            <td class="px-8 py-6 text-sm text-gray-500 font-medium tracking-tight">{{ $historyBorrowed->tanggal_kembali }}</td>
                            <td class="px-8 py-6 text-center">
                                @if($historyBorrowed->book->status === 'Tersedia')
                                <form action="{{ route('Admin.Transaction.storeAgain') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $historyBorrowed->book_id }}">
                                    <button 
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl transition-all shadow-md shadow-blue-100 active:scale-95"
                                        onclick="return confirm('Yakin ingin meminjam buku ini?')">
                                        <i class="ph ph-arrow-counter-clockwise"></i>
                                        Pinjam Lagi
                                    </button>
                                </form>
                                @else
                                    <span class="text-gray-400">Tidak Tersedia</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <!-- Tampilan jika riwayat KOSONG -->
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <i class="ph ph-folder-open text-4xl mb-2"></i>
                                        <p>Tidak ada riwayat peminjaman buku.</p>
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
