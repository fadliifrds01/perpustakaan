<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

    <div class="w-sm max-w-lg bg-white rounded-xl shadow-md p-8">

        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Tambah Anggota Baru</h1>
            <p class="text-gray-500 mb-6">Masukkan data anggota perpustakaan.</p>
        </div>

        <form action="{{ route('Admin.Member.indexMember') }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="Masukkan nama lengkap">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="nama@email.com">
                @error('email')
                    <small style="color:red">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex gap-3 pt-4">
                <a href="{{ route('Admin.Member.indexMember') }}"
                    class="w-1/2 text-center px-5 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold border">
                    Batal
                </a>

                <button type="submit"
                    class="flex-1 rounded-lg bg-blue-600 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                    Tambah Anggota
                </button>
            </div>
        </form>

    </div>

</body>

</html>
