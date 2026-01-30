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
    @include('Components.mainMenuUser');
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

            <div class="flex gap-4">
                <div class="bg-white border border-gray-200 px-6 py-3 rounded-2xl flex items-center gap-3 shadow-sm">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-lg font-bold">
                        2
                    </div>
                    <span class="text-sm font-medium text-gray-500">Buku<br>Dipinjam</span>
                </div>
            </div>
        </header>

        <section class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Detail Buku</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Tanggal Pinjam</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Jatuh Tempo</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Status</th>
                            <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest leading-none text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        <tr class="group hover:bg-gray-50/50 transition-all duration-200">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-16 bg-blue-50 rounded-lg flex items-center justify-center border border-blue-100 group-hover:scale-105 transition-transform">
                                        <i class="ph ph-book-bookmark text-2xl text-blue-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800 text-base leading-tight">Laravel Dasar</p>
                                        <p class="text-xs text-gray-400 mt-1">ID: #BK-0092</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm text-gray-600 font-medium tracking-tight">25 Jan 2024</td>
                            <td class="px-8 py-6 text-sm text-gray-600 font-medium tracking-tight">01 Feb 2024</td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[11px] font-black uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Dipinjam
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <button class="px-4 py-2 bg-white border border-gray-200 hover:border-blue-500 hover:text-blue-600 text-gray-600 text-sm font-bold rounded-xl transition-all shadow-sm">
                                    Kembalikan
                                </button>
                            </td>
                        </tr>

                        <tr class="group hover:bg-red-50/30 transition-all duration-200">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-16 bg-amber-50 rounded-lg flex items-center justify-center border border-amber-100 group-hover:scale-105 transition-transform">
                                        <i class="ph ph-warning-circle text-2xl text-amber-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800 text-base leading-tight">Tailwind CSS Guide</p>
                                        <p class="text-xs text-gray-400 mt-1">ID: #BK-0012</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm text-gray-600 font-medium tracking-tight">10 Jan 2024</td>
                            <td class="px-8 py-6 text-sm text-red-500 font-black tracking-tight underline decoration-red-200">17 Jan 2024</td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-100 text-red-700 rounded-full text-[11px] font-black uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>
                                    Terlambat
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-xl transition-all shadow-md shadow-red-100">
                                    Bayar Denda
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>

        <div class="mt-8 flex items-center gap-6 p-6 bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl text-white shadow-xl shadow-blue-100">
            <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md">
                <i class="ph-fill ph-info text-3xl"></i>
            </div>
            <div>
                <h4 class="text-lg font-bold italic">Peringatan Pengembalian</h4>
                <p class="text-blue-50 text-sm opacity-90 mt-1">Buku yang terlambat dikembalikan akan dikenakan denda administratif sebesar <span class="font-bold underline text-white">Rp 2.000 / hari</span>.</p>
            </div>
        </div>

    </main>

</body>
</html>
