<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Peminjaman - Perpustakaan</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="ml-64 h-screen overflow-y-auto p-8">
        <!-- SIDEBAR -->
        @include('Components.mainMenu')

        <!-- MAIN -->
        <main class="flex-1 p-10">

            <!-- HEADER -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Transaksi Peminjaman</h1>
                <p class="text-gray-500 text-sm">
                    Kelola peminjaman dan pengembalian buku
                </p>
            </div>

            <!-- FORM TRANSAKSI -->
            {{-- <div class="bg-white p-6 rounded-xl shadow-sm border mb-10">
                <h3 class="font-semibold text-gray-700 mb-4">Tambah Transaksi</h3>

                <form class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="text-sm text-gray-600">Anggota</label>
                        <select class="w-full mt-1 border rounded-lg px-3 py-2">
                            <option>Pilih Anggota</option>
                            <option>Fadli</option>
                            <option>Andi</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Buku</label>
                        <select class="w-full mt-1 border rounded-lg px-3 py-2">
                            <option>Pilih Buku</option>
                            <option>Laskar Pelangi</option>
                            <option>Bumi Manusia</option>
                        </select>
                    </div>

                    <div class="flex items-end">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="ph ph-plus-circle mr-2"></i>
                            Pinjam Buku
                        </button>
                    </div>
                </form>
            </div> --}}

            <!-- TABEL TRANSAKSI -->
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">No</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Anggota</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Buku</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Judul Buku</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Tgl Pinjam</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Tgl Kembali</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Status</th>
                            {{-- <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Aksi</th> --}}
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @foreach ($transactions as $trx)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $trx->users->name }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset($trx->book->cover_buku) }}" alt="Cover Buku"
                                            class="w-14 h-20 object-cover rounded-md shadow">
                                    </div>
                                </td>
                                <td class="px-6 py-4">Laskar Pelangi</td>
                                <td class="px-6 py-4 text-center">21-01-2026</td>
                                <td class="px-6 py-4 text-center">28-01-2026</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="bg-yellow-100 text-yellow-600 px-2 py-1 text-xs rounded-full font-semibold">
                                        Dipinjam
                                    </span>
                                </td>
                                {{-- <td class="px-6 py-4 text-center">
                                <button class="text-green-600 hover:text-green-700">
                                    <i class="ph ph-check-circle text-xl"></i>
                                </button>
                            </td> --}}
                            </tr>
                            @endforeach
                    </tbody>

                </table>
            </div>

        </main>
    </div>

</body>

</html>
