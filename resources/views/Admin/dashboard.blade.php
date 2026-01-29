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

    <div class="ml-64 h-screen overflow-y-auto p-8">
        @include('Components.mainMenu')

        <main class="flex-1 p-10">
            <header class="mb-8">
                @auth
                    <p>Hallo, {{ Auth::user()->name }}!</p>
                @endauth
                @guest
                    <p style="color: red;">Silakan login terlebih dahulu.</p>
                @endguest
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang Di, Dashboard Admin!</h1>
                <p class="text-gray-500">Ringkasan aktivitas perpustakaan Anda hari ini.</p>
            </header>

            <section>
                <h2 class="text-xl font-bold text-gray-700 mb-6">Aksi Cepat</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('Admin.Book.indexBook') }}"
                        class="group p-6 bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 transition-all">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <i class="ph ph-books text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Kelola Data Buku</h3>
                        <p class="text-gray-500 text-sm mt-2">Tambah, edit, atau hapus koleksi buku perpustakaan.</p>
                    </a>

                    <a href="{{ route('Admin.Transaction.indexTransaction') }}"
                        class="group p-6 bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 transition-all">
                        <div
                            class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-green-600 group-hover:text-white transition-colors">
                            <i class="ph ph-arrows-left-right text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Transaksi</h3>
                        <p class="text-gray-500 text-sm mt-2">Catat peminjaman dan pengembalian buku dengan mudah.</p>
                    </a>

                    <a href="{{ route('Admin.Member.indexMember') }}"
                        class="group p-6 bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 transition-all">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                            <i class="ph ph-users text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Kelola Anggota</h3>
                        <p class="text-gray-500 text-sm mt-2">Atur data anggota aktif dan riwayat keanggotaan.</p>
                    </a>
                </div>
            </section>
        </main>
    </div>

</body>

</html>
