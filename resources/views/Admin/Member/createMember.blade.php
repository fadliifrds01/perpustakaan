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

        {{-- ✅ HANYA 1 FORM --}}
        <form action="{{ route('Member.CreateMember') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Lengkap
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Alamat Email
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">

                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 pt-4">
                <a href="{{ route('Admin.Member.indexMember') }}"
                    class="w-1/2 text-center px-5 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 border">
                    Batal
                </a>

                <button type="submit" class="flex-1 rounded-lg bg-blue-600 py-2 text-white hover:bg-blue-700">
                    Tambah Anggota
                </button>
            </div>

        </form>

    </div>

</body>

</html>
