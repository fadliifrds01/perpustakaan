<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">

    {{-- Sidebar --}}
    @include('Components.mainMenu')

    {{-- Content --}}
    <div class="min-h-screen lg:ml-64 p-4 sm:p-6 lg:p-10">

        <main class="max-w-7xl mx-auto">

            {{-- Header --}}
            <header class="mb-8 space-y-2 mt-20 md:mt-0">

                @auth
                    <p class="text-sm text-gray-500">
                        Hallo, <span class="font-semibold">{{ Auth::user()->name }}</span> 👋
                    </p>
                @endauth

                @guest
                    <p class="text-red-500 text-sm">
                        Silakan login terlebih dahulu.
                    </p>
                @endguest

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800">
                    Dashboard Admin
                </h1>

                <p class="text-gray-500 text-sm sm:text-base">
                    Ringkasan aktivitas perpustakaan hari ini.
                </p>

            </header>


            {{-- Quick Action --}}
            <section>

                <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-6">
                    Aksi Cepat
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    {{-- Buku --}}
                    <a href="{{ route('Admin.Book.indexBook') }}"
                        class="group p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100 transition">

                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition">
                            <i class="ph ph-books text-2xl"></i>
                        </div>

                        <h3 class="text-base sm:text-lg font-bold text-gray-800">
                            Kelola Data Buku
                        </h3>

                        <p class="text-gray-500 text-xs sm:text-sm mt-2">
                            Tambah, edit, atau hapus koleksi buku perpustakaan.
                        </p>
                    </a>


                    {{-- Transaksi --}}
                    <a href="{{ route('Admin.Transaction.indexTransaction') }}"
                        class="group p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100 transition">

                        <div
                            class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-600 group-hover:text-white transition">
                            <i class="ph ph-arrows-left-right text-2xl"></i>
                        </div>

                        <h3 class="text-base sm:text-lg font-bold text-gray-800">
                            Transaksi
                        </h3>

                        <p class="text-gray-500 text-xs sm:text-sm mt-2">
                            Catat peminjaman dan pengembalian buku.
                        </p>
                    </a>


                    {{-- Member --}}
                    <a href="{{ route('Admin.Member.indexMember') }}"
                        class="group p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100 transition">

                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-600 group-hover:text-white transition">
                            <i class="ph ph-users text-2xl"></i>
                        </div>

                        <h3 class="text-base sm:text-lg font-bold text-gray-800">
                            Kelola Anggota
                        </h3>

                        <p class="text-gray-500 text-xs sm:text-sm mt-2">
                            Atur data anggota aktif dan riwayat.
                        </p>
                    </a>

                </div>

            </section>

        </main>

    </div>

</body>


</html>
