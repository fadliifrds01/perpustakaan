<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku | Perpustakaan Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-50 min-h-screen flex">

    @include('Components.mainMenu')

    <main class="flex-1 w-full lg:ml-64 p-4 sm:p-6 lg:p-10">

        <header class="mb-6 lg:mb-10 mt-20 md:mt-0">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold">
                Pinjaman Aktif 📖
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola buku yang sedang kamu pinjam
            </p>
        </header>

        @include('Components.alerts')

        <section class="bg-white rounded-2xl shadow-sm border border-gray-100">

            {{-- ================= DESKTOP TABLE ================= --}}
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-sm">

                    <thead class="bg-gray-50">
                        <tr class="text-gray-400 uppercase text-xs">
                            <th class="p-4">Buku</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($borrowedBooks as $borrowedBook)
                            <tr class="hover:bg-gray-50">

                                <td class="p-4">
                                    <img src="{{ asset($borrowedBook->book->cover_buku) }}"
                                        class="w-10 h-14 object-cover rounded">
                                </td>

                                <td class="font-semibold">
                                    {{ $borrowedBook->book->judul_buku }}
                                </td>

                                <td>
                                    {{ $borrowedBook->tanggal_pinjam }}
                                </td>

                                <td>
                                    <span class="text-emerald-600 font-semibold">
                                        {{ $borrowedBook->book->status }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <form action="{{ route('Admin.Transaction.returnBook', $borrowedBook->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="book_id" value="{{ $borrowedBook->book_id }}">

                                        <button
                                            class="bg-gray-100 hover:bg-blue-600 hover:text-white px-3 py-1 rounded-lg text-xs transition"
                                            onclick="return confirm('Yakin ingin mengembalikan buku ini')">
                                            Kembalikan
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-10 text-gray-400">
                                    Tidak ada pinjaman aktif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            {{-- ================= MOBILE CARD ================= --}}
            <div class="md:hidden p-4 space-y-4">

                @forelse ($borrowedBooks as $borrowedBook)
                    <div class="border rounded-xl p-4 shadow-sm flex gap-4 items-start">

                        <img src="{{ asset($borrowedBook->book->cover_buku) }}"
                            class="w-16 h-24 object-cover rounded-lg">

                        <div class="flex-1 space-y-1">

                            <h3 class="font-semibold text-sm">
                                {{ $borrowedBook->book->judul_buku }}
                            </h3>

                            <p class="text-xs text-gray-500">
                                Pinjam: {{ $borrowedBook->tanggal_pinjam }}
                            </p>

                            <p class="text-xs font-semibold text-emerald-600">
                                {{ $borrowedBook->book->status }}
                            </p>

                            <form action="{{ route('Admin.Transaction.returnBook', $borrowedBook->id) }}"
                                method="POST" class="pt-2">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="book_id" value="{{ $borrowedBook->book_id }}">

                                <button
                                    class="w-full bg-blue-600 text-white py-2 rounded-lg text-xs hover:bg-blue-700 transition"
                                    onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                    Kembalikan
                                </button>
                            </form>

                        </div>
                    </div>

                @empty
                    <p class="text-center text-gray-400">
                        Tidak ada pinjaman aktif
                    </p>
                @endforelse

            </div>

        </section>


    </main>

</body>

</html>
