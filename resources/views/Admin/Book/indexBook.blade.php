<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Buku - Perpustakaan</title>
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
                    class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in">
                    <i class="ph ph-layout text-xl mr-3"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('Admin.Book.indexBook') }}"
                    class="flex items-center px-6 py-3 bg-blue-50 text-blue-600 border-r-4 border-blue-600">
                    <i class="ph ph-books text-xl mr-3"></i>
                    <span class="font-semibold">Kelola Data Buku</span>
                </a>
                <a href="{{ route('Admin.Transaction.indexTransaction') }}"
                    class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in">
                    <i class="ph ph-arrows-left-right text-xl mr-3"></i>
                    <span>Transaksi</span>
                </a>
                <a href="{{ route('Admin.Member.indexMember') }}"
                    class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in">
                    <i class="ph ph-users text-xl mr-3"></i>
                    <span>Kelola Anggota</span>
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
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Kelola Data Buku</h1>
                    <p class="text-gray-500 text-sm">Kelola koleksi buku perpustakaan Anda di sini.</p>
                </div>
                <a href="{{ route('Admin.Book.createBook') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-all">
                    <i class="ph ph-plus-circle text-xl mr-2"></i>
                    Tambah Buku
                </a>
            </div>

            <div class="w-full bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">
                                No
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase text-center">
                                Buku
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">
                                Judul Buku
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase text-center">
                                Pengarang
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase text-center">
                                Penerbit
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase text-center">
                                Tahun Terbit
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase text-center">
                                Status
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach ($books as $book)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-4">
                                        <img src={{ $book->cover_buku }} alt="Cover Buku"
                                            class="object-cover rounded-sm shadow">
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div>
                                        <div class="font-medium text-gray-800">
                                            {{ $book->judul_buku }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-gray-600 text-sm text-center">
                                    {{ $book->pengarang }}
                                </td>

                                <td class="px-6 py-4 text-gray-600 text-sm">
                                    {{ $book->penerbit }}
                                </td>

                                <td class="px-6 py-4 text-gray-600 text-sm text-center">
                                    {{ $book->tahun_terbit }}
                                </td>

                                <td class="px-6 py-4 text-gray-600 text-sm text-center">
                                    {{ $book->status }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-3">
                                        <a href="{{ route('Admin.Book.editBook') }}"
                                            class="text-blue-600 hover:text-blue-800"><i
                                                class="ph ph-pencil-line text-xl"></i></a>
                                        <a href="" class="text-red-500 hover:text-red-600" title="Hapus">
                                            <i class="ph ph-trash text-xl"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>

        </main>
    </div>

</body>

</html>
