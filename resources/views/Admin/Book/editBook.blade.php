<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-md bg-white rounded-xl shadow-sm border border-gray-100 p-8">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 text-center">
                    Edit Buku
                </h2>
                <p class="text-gray-500 text-center text-sm italic">Mode Preview (Tanpa Database)</p>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Judul Buku
                    </label>
                    <input type="text" name="judul" value="Laskar Pelangi"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan judul buku">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Pengarang
                    </label>
                    <input type="text" name="pengarang" value="Andrea Hirata"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama pengarang">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Kategori
                    </label>
                    <select name="kategori"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="Novel" selected>Novel</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Agama">Agama</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Stok Buku
                    </label>
                    <input type="number" name="stok" value="25"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Cover Buku
                    </label>

                    <div class="mb-3 flex items-center space-x-4">
                        <div
                            class="w-16 h-20 bg-gray-200 rounded flex items-center justify-center border text-gray-400 text-[10px] text-center px-1">
                            Foto Lama
                        </div>
                        <span class="text-xs text-gray-500 italic">laskar_pelangi.jpg</span>
                    </div>

                    <input type="file" name="gambar"
                        class="w-full text-sm text-gray-500
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-lg file:border-0
                               file:text-sm file:font-semibold
                               file:bg-blue-50 file:text-blue-600
                               hover:file:bg-blue-100">
                </div>

                <div class="flex justify-between items-center gap-4">
                    <button type="button" onclick="history.back()"
                        class="w-1/2 text-center px-5 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition-all font-semibold border border-gray-200">
                        Kembali
                    </button>
                    <button type="submit"
                        class="w-1/2 px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow-md transition-all font-semibold">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>
