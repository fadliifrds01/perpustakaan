<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

    <div class="w-sm max-w-lg bg-white rounded-xl shadow-md p-8">

        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Edit Anggota</h1>
            <p class="text-gray-500 mb-6">Ubah data anggota perpustakaan.</p>
        </div>

        {{-- $member dikirim dari controller --}}
        <form action="{{ route('Admin.Member.updateMember', $member->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" id="name" name="name"
                    value="{{ old('name', $member->name) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition-all"
                    placeholder="Masukkan nama lengkap">
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                <input type="email" id="email" name="email"
                    value="{{ old('email', $member->email) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition-all"
                    placeholder="nama@email.com">

                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 pt-4">
                <a href="{{ route('Admin.Member.indexMember') }}"
                    class="w-1/2 text-center px-5 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold border">
                    Batal
                </a>

                <button type="submit"
                    class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold shadow">
                    Update Data
                </button>
            </div>
        </form>

    </div>

</body>

</html>
