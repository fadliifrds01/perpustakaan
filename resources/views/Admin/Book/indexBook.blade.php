<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Buku - Perpustakaan</title>

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

            {{-- HEADER --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-20 md:mt-0 mb-8">

                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                        Kelola Data Buku 📚
                    </h1>
                    <p class="text-gray-500 text-sm">
                        Tambah, edit, atau hapus koleksi buku perpustakaan
                    </p>
                </div>

                <a href="{{ route('Admin.Book.createBook') }}"
                    class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl shadow-sm transition">

                    <i class="ph ph-plus-circle text-lg"></i>
                    Tambah Buku
                </a>

            </div>


            {{-- ALERT --}}
            @include('Components.alerts')


            {{-- ===================================================== --}}
            {{-- ================= DESKTOP TABLE ====================== --}}
            {{-- ===================================================== --}}
            <div class="hidden lg:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4 text-left">No</th>
                            <th class="px-6 py-4 text-center">Cover</th>
                            <th class="px-6 py-4">Judul</th>
                            <th class="px-6 py-4">Pengarang</th>
                            <th class="px-6 py-4">Penerbit</th>
                            <th class="px-6 py-4">Tahun</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">

                        @foreach ($books as $book)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 font-semibold">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <img src="{{ asset($book->cover_buku) }}"
                                        class="w-14 h-20 object-cover mx-auto rounded-lg shadow">
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $book->judul_buku }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $book->pengarang }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $book->penerbit }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $book->tahun_terbit }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $book->status === 'Tersedia' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                        {{ $book->status }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-4 text-lg">

                                        <a href="{{ route('Admin.Book.editBook', $book->id) }}"
                                            class="text-blue-600 hover:text-blue-800">
                                            <i class="ph ph-pencil-line"></i>
                                        </a>

                                        <form action="{{ route('Book.destroy', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500 hover:text-red-700"
                                                onclick="return confirm('Yakin hapus buku?')">
                                                <i class="ph ph-trash"></i>
                                            </button>
                                        </form>

                                    </div>
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

                @foreach ($books as $book)
                    <div class="bg-white rounded-2xl shadow-sm p-4 flex gap-4">

                        {{-- Cover --}}
                        <img src="{{ asset($book->cover_buku) }}" class="w-20 h-28 object-cover rounded-lg shadow">

                        {{-- Info --}}
                        <div class="flex-1">

                            <h3 class="font-bold text-gray-800 text-sm">
                                {{ $book->judul_buku }}
                            </h3>

                            <p class="text-xs text-gray-500 mt-1">
                                {{ $book->pengarang }}
                            </p>

                            <p class="text-xs text-gray-500">
                                {{ $book->penerbit }} • {{ $book->tahun_terbit }}
                            </p>

                            <span
                                class="inline-block mt-2 px-3 py-1 text-xs rounded-full
                            {{ $book->status === 'Tersedia' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                {{ $book->status }}
                            </span>

                            {{-- Actions --}}
                            <div class="flex gap-6 mt-3 text-sm font-medium">

                                <a href="{{ route('Admin.Book.editBook', $book->id) }}" class="text-blue-600">
                                    Edit
                                </a>

                                <form action="{{ route('Book.destroy', $book->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500">
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </main>
    </div>

</body>

</html>
