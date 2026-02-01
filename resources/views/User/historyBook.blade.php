<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman | Perpustakaan Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-50 min-h-screen flex">

    @include('Components.mainMenu')

    <main class="flex-1 w-full lg:ml-64 p-4 sm:p-6 lg:p-10">

        <header class="mb-6 lg:mb-10 mt-20 md:mt-0">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold">
                Riwayat Peminjaman 📜
            </h1>
            <p class="text-gray-500 text-sm">
                Lihat riwayat peminjaman bukumu sebelumnya
                </p>
            </header>

        <section class="bg-white rounded-2xl shadow-sm border border-gray-100">

            {{-- ================= DESKTOP TABLE ================= --}}
            <div class="hidden md:block overflow-x-auto">

                <table class="w-full text-sm min-w-[700px]">

                    <thead class="bg-gray-50 text-xs uppercase text-gray-400">
                        <tr>
                            <th class="p-4">Buku</th>
                            <th>Judul</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">

                        @forelse ($historyBorroweds as $historyBorrowed)
                            <tr class="hover:bg-gray-50 text-center">

                                <td class="p-4">
                                    <img src="{{ asset($historyBorrowed->book->cover_buku) }}"
                                        class="w-10 h-14 object-cover rounded">
                                </td>

                                <td class="font-semibold">
                                    {{ $historyBorrowed->book->judul_buku }}
                                </td>

                                <td>{{ $historyBorrowed->tanggal_pinjam }}</td>
                                <td>{{ $historyBorrowed->tanggal_kembali }}</td>

                                <td>
                                    @if ($historyBorrowed->book->status === 'Tersedia')
                                        <form action="{{ route('Admin.Transaction.storeAgain') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="book_id"
                                                value="{{ $historyBorrowed->book_id }}">

                                            <button
                                                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-xs">
                                                Pinjam Lagi
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs">Tidak tersedia</span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-10 text-gray-400">
                                    Tidak ada riwayat
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>


            {{-- ================= MOBILE CARD ================= --}}
            <div class="md:hidden p-4 space-y-4">

                @forelse ($historyBorroweds as $historyBorrowed)
                    <div class="border rounded-xl p-4 shadow-sm flex gap-4">

                        <img src="{{ asset($historyBorrowed->book->cover_buku) }}"
                            class="w-16 h-24 object-cover rounded-lg">

                        <div class="flex-1 space-y-1 text-sm">

                            <h3 class="font-semibold">
                                {{ $historyBorrowed->book->judul_buku }}
                            </h3>

                            <p class="text-xs text-gray-500">
                                Pinjam : {{ $historyBorrowed->tanggal_pinjam }}
                            </p>

                            <p class="text-xs text-gray-500">
                                Kembali : {{ $historyBorrowed->tanggal_kembali }}
                            </p>

                            @if ($historyBorrowed->book->status === 'Tersedia')
                                <form action="{{ route('Admin.Transaction.storeAgain') }}" method="POST"
                                    class="pt-2">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $historyBorrowed->book_id }}">

                                    <button
                                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-xs">
                                        Pinjam Lagi
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400 text-xs">
                                    Tidak tersedia
                                </span>
                            @endif

                        </div>

                    </div>

                @empty
                    <p class="text-center text-gray-400">
                        Tidak ada riwayat
                    </p>
                @endforelse

            </div>

        </section>


    </main>

</body>

</html>
