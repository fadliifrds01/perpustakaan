<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota - Perpustakaan</title>

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

        {{-- ================= HEADER ================= --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 mt-20 md:mt-0">

            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                    Kelola Anggota 👥
                </h1>
                <p class="text-gray-500 text-sm">
                    Manajemen data anggota perpustakaan
                </p>
            </div>

            <a href="{{ route('Admin.Member.createMember') }}"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl shadow-sm transition">
                <i class="ph ph-user-plus"></i>
                Tambah Anggota
            </a>

        </div>


        {{-- ================= STAT CARD ================= --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">

            <div class="bg-white p-6 rounded-2xl shadow-sm border">
                <p class="text-xs uppercase text-gray-400 font-semibold">
                    Total Anggota
                </p>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">
                    {{ $members->count() }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border">
                <p class="text-xs uppercase text-gray-400 font-semibold">
                    Admin
                </p>
                <h2 class="text-3xl font-bold text-blue-600 mt-1">
                    {{ $members->where('role','admin')->count() }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border">
                <p class="text-xs uppercase text-gray-400 font-semibold">
                    Member
                </p>
                <h2 class="text-3xl font-bold text-green-600 mt-1">
                    {{ $members->where('role','member')->count() }}
                </h2>
            </div>

        </div>


        {{-- ALERT --}}
        @include('Components.alerts')


        {{-- ===================================================== --}}
        {{-- ================= DESKTOP TABLE ====================== --}}
        {{-- ===================================================== --}}
        <div class="hidden lg:block bg-white rounded-2xl shadow-sm border overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4 text-center">Role</th>
                        <th class="px-6 py-4 text-center">Tanggal Join</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach ($members as $member)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 font-semibold">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $member->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $member->email }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $member->role === 'admin'
                                    ? 'bg-blue-100 text-blue-600'
                                    : 'bg-green-100 text-green-600' }}">
                                {{ ucfirst($member->role) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-center text-gray-600">
                            {{ $member->created_at?->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-4 text-lg">

                                <a href=""
                                   class="text-blue-600 hover:text-blue-800">
                                    <i class="ph ph-pencil-line"></i>
                                </a>

                                <form action="{{ route('Member.destroy', $member->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('Hapus anggota ini?')">
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

            @foreach ($members as $member)

            <div class="bg-white rounded-2xl shadow-sm p-4">

                <div class="flex justify-between items-start">

                    <div>
                        <h3 class="font-bold text-gray-800">
                            {{ $member->name }}
                        </h3>

                        <p class="text-xs text-gray-500">
                            {{ $member->email }}
                        </p>

                        <p class="text-xs text-gray-400 mt-1">
                            Join : {{ $member->created_at?->format('d M Y') }}
                        </p>
                    </div>

                    <span class="px-3 py-1 text-xs rounded-full
                        {{ $member->role === 'admin'
                            ? 'bg-blue-100 text-blue-600'
                            : 'bg-green-100 text-green-600' }}">
                        {{ ucfirst($member->role) }}
                    </span>

                </div>

                <div class="flex gap-6 mt-4 text-sm font-medium">

                    <a href=""
                        class="text-blue-600">
                        Edit
                    </a>

                    <form action="{{ route('Member.destroy', $member->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="text-red-500">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>

            @endforeach

        </div>

    </main>
</div>

</body>
</html>
