<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman | Perpusku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-50 flex min-h-screen font-sans antialiased text-gray-900">

    {{-- ================= SIDEBAR ================= --}}
    @include('Components.mainMenuUser');
    {{-- =========================================== --}}


    {{-- MAIN CONTENT --}}
    <main class="ml-64 p-10 w-full">
        <h1 class="text-2xl font-bold mb-8">📜 Riwayat Peminjaman</h1>

        <div class="grid gap-4">

            <div class="bg-white p-5 rounded-xl shadow-sm border flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-lg">Laravel Dasar</h3>
                    <p class="text-gray-500 text-sm italic">Dikembalikan: 12 Jan 2026</p>
                </div>
                <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-xs font-bold uppercase">
                    Selesai
                </span>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border flex justify-between items-center border-l-4 border-l-red-500">
                <div>
                    <h3 class="font-bold text-lg text-gray-800">JavaScript Pemula</h3>
                    <p class="text-gray-500 text-sm italic">Dikembalikan: 05 Jan 2026</p>
                    <p class="text-red-500 text-xs font-semibold mt-1">Denda: Rp 2.000</p>
                </div>
                <span class="bg-red-100 text-red-700 px-4 py-1 rounded-full text-xs font-bold uppercase">
                    Terlambat
                </span>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-lg">Tailwind CSS Guide</h3>
                    <p class="text-gray-500 text-sm italic">Dikembalikan: 01 Jan 2026</p>
                </div>
                <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-xs font-bold uppercase">
                    Selesai
                </span>
            </div>

        </div>
    </main>

</body>

</html>
