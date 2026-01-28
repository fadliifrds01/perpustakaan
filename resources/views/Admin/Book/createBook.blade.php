<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-sm border border-gray-100 p-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Tambah Buku Baru
            </h2>

            {{-- ✅ POST ke store --}}
            <form action="{{ route('Admin.Book.indexBook') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Cover Buku --}}
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Cover Buku
                    </label>
                    <input type="file" name="cover_buku"
                        class="w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-600
                    hover:file:bg-blue-100">
                </div>

                {{-- Judul Buku --}}
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Judul Buku
                    </label>
                    <input type="text" name="judul_buku" value="{{ old('judul_buku') }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan judul buku">
                </div>

                {{-- Pengarang --}}
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Pengarang
                    </label>
                    <input type="text" name="pengarang" value="{{ old('pengarang') }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama pengarang">
                </div>

                {{-- Penerbit --}}
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Penerbit
                    </label>
                    <input type="text" name="penerbit" value="{{ old('penerbit') }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama penerbit">
                </div>

                {{-- Tahun Terbit --}}
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Tahun Terbit
                    </label>
                    <select name="tahun_terbit" class="w-full rounded-lg border border-gray-300 px-4 py-2">

                        @for ($year = date('Y'); $year >= 1980; $year--)
                            <option value="{{ $year }}" name="" {{ old('tahun_terbit') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endfor

                    </select>
                </div>

                {{-- Status --}}
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Status
                    </label>
                    <select name="status"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-4">

                    <a href="{{ route('Admin.Book.indexBook') }}"
                        class="w-1/2 text-center px-5 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold border">
                        Batal
                    </a>

                    <button type="submit"
                        class="w-1/2 px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow-md font-semibold">
                        Tambah Buku
                    </button>

                </div>

            </form>
        </div>
    </div>

</body>

</html>
