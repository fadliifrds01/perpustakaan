<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-10">

        <div class="w-full max-w-lg bg-white shadow-lg rounded-2xl p-8">

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">
                ✏️ Edit Buku
            </h2>

            <form action="{{ route('Book.updateBook', $book->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Cover -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Cover Buku
                    </label>

                    <!-- Preview cover lama -->
                    @if ($book->cover_buku)
                        <div class="mb-3 flex items-center gap-4">
                            <img src="{{ $book->cover_buku }}" class="w-16 h-20 object-cover rounded-md shadow border">
                            <span class="text-xs text-gray-500 italic">Cover saat ini</span>
                        </div>
                    @endif

                    <input type="file" name="cover_buku"
                        class="w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-600
                           hover:file:bg-blue-100">
                </div>

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Judul Buku
                    </label>
                    <input type="text" name="judul_buku" value="{{ $book->judul_buku }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Pengarang -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Pengarang
                    </label>
                    <input type="text" name="pengarang" value="{{ $book->pengarang }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Penerbit -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Penerbit
                    </label>
                    <input type="text" name="penerbit" value="{{ $book->penerbit }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Tahun Terbit -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Tahun Terbit
                    </label>
                    <input type="number" name="tahun_terbit" value="{{ $book->tahun_terbit }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Status
                    </label>
                    <select name="status"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        <option value="Tersedia" {{ $book->status == 'Tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="Dipinjam" {{ $book->status == 'Dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>
                    </select>
                </div>



                <!-- Buttons -->
                <div class="flex gap-4 pt-4">
                    <a href="{{ route('Admin.Book.indexBook') }}"
                        class="w-1/2 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 rounded-lg font-semibold">
                        Batal
                    </a>

                    <button type="submit"
                        class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold shadow">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>

    </div>


</body>

</html>
