<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota - Perpustakaan</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6">
                <h2 class="text-xl font-bold italic text-blue-600">Admin Perpustakaan</h2>
            </div>
            <nav class="mt-4">
                <a href="{{ route('Admin.dashboard') }}"
                    class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-100 ease-in">
                    <i class="ph ph-layout text-xl mr-3"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('Admin.Book.indexBook') }}"
                    class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-100 ease-in">
                    <i class="ph ph-books text-xl mr-3"></i>
                    <span>Kelola Data Buku</span>
                </a>
                <a href="{{ route('Admin.Transaction.indexTransaction') }}"
                    class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-100 ease-in">
                    <i class="ph ph-arrows-left-right text-xl mr-3"></i>
                    <span>Transaksi</span>
                </a>
                <a href="{{ route('Admin.Member.indexMember') }}"
                    class="flex items-center px-6 py-3 bg-blue-50 text-blue-600 border-r-4 border-blue-600 transition-colors duration-100 ease-in">
                    <i class="ph ph-users text-xl mr-3"></i>
                    <span class="font-semibold">Kelola Anggota</span>
                </a>

                <div class="mt-10 px-6">
                    <form action="{{ route('Auth.login') }}" method="GET">
                        <button class="flex items-center text-red-500 hover:text-red-700 font-medium">
                            <i class="ph ph-sign-out text-xl mr-3"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            <header class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Kelola Anggota</h1>
                    <p class="text-gray-500">Manajemen data anggota perpustakaan.</p>
                </div>
                <a href=""
                    class="flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 transition-all shadow-sm">
                    <i class="ph ph-user-plus text-xl mr-2"></i>
                    Tambah Anggota Baru
                </a>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 uppercase font-semibold">Total Anggota</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-1">1,240</h2>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 uppercase font-semibold">Anggota Aktif</p>
                    <h2 class="text-3xl font-bold text-green-600 mt-1">1,150</h2>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 uppercase font-semibold">Anggota Baru (Bulan Ini)</p>
                    <h2 class="text-3xl font-bold text-blue-600 mt-1">45</h2>
                </div>
            </div>

            <section class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Anggota</h3>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="ph ph-magnifying-glass text-gray-400"></i>
                        </span>
                        <input type="text" placeholder="Cari nama atau ID..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">No</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">ID Anggota</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Lengkap</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">Email</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">Tanggal Join</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">Status</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium">1</td>
                                <td class="px-6 py-4 text-sm font-medium text-blue-600">#LIB-001</td>
                                <td class="px-6 py-4 text-sm text-gray-800">Andi Saputra</td>
                                <td class="px-6 py-4 text-sm text-gray-500">andi@email.com</td>
                                <td class="px-6 py-4 text-sm text-gray-500">12 Jan 2024</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <button class="text-blue-600 hover:text-blue-800"><i
                                                class="ph ph-pencil-line text-xl"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i
                                                class="ph ph-trash text-xl"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium">2</td>
                                <td class="px-6 py-4 text-sm font-medium text-blue-600">#LIB-002</td>
                                <td class="px-6 py-4 text-sm text-gray-800">Siti Aminah</td>
                                <td class="px-6 py-4 text-sm text-gray-500">siti@email.com</td>
                                <td class="px-6 py-4 text-sm text-gray-500">15 Jan 2024</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Non-Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <button class="text-blue-600 hover:text-blue-800"><i
                                                class="ph ph-pencil-line text-xl"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i
                                                class="ph ph-trash text-xl"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div
                    class="p-6 bg-gray-50 border-t border-gray-100 flex justify-between items-center text-sm text-gray-600">
                    <span>Menampilkan 2 dari 1,240 anggota</span>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 border rounded bg-white hover:bg-gray-100">Previous</button>
                        <button class="px-4 py-2 border rounded bg-white hover:bg-gray-100">Next</button>
                    </div>
                </div> --}}
            </section>
        </main>
    </div>

</body>

</html>
