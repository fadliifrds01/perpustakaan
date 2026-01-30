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
    @include('Components.mainMenuUser')
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
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Status</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        {{-- Baris Riwayat --}}
                        <tr class="group hover:bg-gray-50/50 transition-all duration-200">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-16 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200 group-hover:bg-blue-50 group-hover:border-blue-100 transition-colors">
                                        <i class="ph ph-book-open text-2xl text-gray-400 group-hover:text-blue-500"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="font-bold text-gray-800 text-base leading-tight">Laravel Dasar</p>
                            <td class="px-8 py-6 text-sm text-gray-500 font-medium tracking-tight">10 Jan 2026</td>
                            <td class="px-8 py-6 text-sm text-gray-500 font-medium tracking-tight">17 Jan 2026</td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-black uppercase">
                                    <i class="ph-fill ph-check-circle text-xs"></i>
                                    Dikembalikan
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <button class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl transition-all shadow-md shadow-blue-100 active:scale-95">
                                    <i class="ph ph-arrow-counter-clockwise"></i>
                                    Pinjam Lagi
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>

    </main>

</body>
</html>
