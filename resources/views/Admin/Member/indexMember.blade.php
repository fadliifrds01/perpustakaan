<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota - Perpustakaan</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen">
        @include('Components.mainMenu')

        <main class="ml-64 w-full overflow-y-auto p-8">
            <header class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Kelola Anggota</h1>
                    <p class="text-gray-500">Manajemen data anggota perpustakaan.</p>
                </div>
                <a href="{{ route('Admin.Member.createMember') }}"
                    class="flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 transition-all shadow-sm">
                    <i class="ph ph-user-plus text-xl mr-2"></i>
                    Tambah Anggota Baru
                </a>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 uppercase font-semibold">Total Anggota</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-1">1,240</h2>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 uppercase font-semibold">Anggota Aktif</p>
                    <h2 class="text-3xl font-bold text-green-600 mt-1">1,150</h2>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 uppercase font-semibold">Anggota Baru (Bulan Ini)</p>
                    <h2 class="text-3xl font-bold text-blue-600 mt-1">45</h2>
                </div>
            </div>

            <section class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Anggota</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">No</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Lengkap</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">Email</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">Role</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600">Tanggal Join</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($members as $member)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $member->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $member->email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $member->role }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ now()->format('d-M-Y') }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center gap-3">
                                            <button class="text-blue-600 hover:text-blue-800"><i
                                                    class="ph ph-pencil-line text-xl"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i
                                                    class="ph ph-trash text-xl"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div
                    class="p-6 bg-gray-50 border-t border-gray-100 flex justify-between items-center text-sm text-gray-600">
                    <span>Menampilkan 2 dari 1,240 anggota</span>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 border rounded bg-white hover:bg-gray-100">Previous</button>
                        <button class="px-4 py-2 border rounded bg-white hover:bg-gray-100">Next</button>
                    </div>
                </div> --}}
            </section>
        </main>
    </div>

</body>

</html>
