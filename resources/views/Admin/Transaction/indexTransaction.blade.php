<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Peminjaman - Perpustakaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-50 font-sans antialiased">

<div class="flex min-h-screen">

    {{-- ================= SIDEBAR ================= --}}
    @include('Components.mainMenu')
    {{-- =========================================== --}}

    {{-- ================= CONTENT ================= --}}
    <main class="flex-1 lg:ml-64 p-4 sm:p-6 lg:p-10">

        {{-- ================= HEADER ================= --}}
        <div class="mb-8 mt-20 md:mt-0">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                Transaksi Peminjaman 📚
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola peminjaman dan pengembalian buku anggota
            </p>
        </div>


        {{-- ===================================================== --}}
        {{-- ================= DESKTOP TABLE ====================== --}}
        {{-- ===================================================== --}}
        <div class="hidden lg:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4 text-center">Cover</th>
                        <th class="px-6 py-4">Judul Buku</th>
                        <th class="px-6 py-4 text-center">Tgl Pinjam</th>
                        <th class="px-6 py-4 text-center">Tgl Kembali</th>
                        <th class="px-6 py-4 text-center">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach ($transactions as $trx)

                        @php
                            $status = $trx->tanggal_kembali
                                ? ['Sudah dikembalikan', 'green']
                                : ['Belum dikembalikan', 'red'];
                        @endphp

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4 font-semibold">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $trx->user->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <img src="{{ asset($trx->book->cover_buku) }}"
                                     class="w-14 h-20 object-cover mx-auto rounded-lg shadow">
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $trx->book->judul_buku }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                {{ $trx->tanggal_pinjam }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                {{ $trx->tanggal_kembali ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $status[1] === 'green'
                                        ? 'bg-green-100 text-green-600'
                                        : 'bg-red-100 text-red-600' }}">
                                    {{ $status[0] }}
                                </span>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>



        {{-- ===================================================== --}}
        {{-- ================= MOBILE CARD ======================= --}}
        {{-- ===================================================== --}}
        <div class="lg:hidden space-y-4">

            @foreach ($transactions as $trx)

                @php
                    $status = $trx->tanggal_kembali
                        ? ['Sudah dikembalikan', 'green']
                        : ['Belum dikembalikan', 'red'];
                @endphp

                <div class="bg-white rounded-2xl shadow-sm p-4 flex gap-4">

                    {{-- Cover --}}
                    <img src="{{ asset($trx->book->cover_buku) }}"
                         class="w-20 h-28 object-cover rounded-lg shadow">

                    {{-- Info --}}
                    <div class="flex-1">

                        <h3 class="font-bold text-gray-800 text-sm">
                            {{ $trx->book->judul_buku }}
                        </h3>

                        <p class="text-xs text-gray-500 mt-1">
                            Peminjam : {{ $trx->user->name ?? '-' }}
                        </p>

                        <p class="text-xs text-gray-500">
                            Pinjam : {{ $trx->tanggal_pinjam }}
                        </p>

                        <p class="text-xs text-gray-500">
                            Kembali : {{ $trx->tanggal_kembali ?? '-' }}
                        </p>

                        <span class="inline-block mt-2 px-3 py-1 text-xs rounded-full
                            {{ $status[1] === 'green'
                                ? 'bg-green-100 text-green-600'
                                : 'bg-red-100 text-red-600' }}">
                            {{ $status[0] }}
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    </main>
</div>

</body>
</html>
