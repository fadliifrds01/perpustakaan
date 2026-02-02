<!-- Alpine WAJIB -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<div x-data="{ open: false }" class="relative">

    <!-- ================= MOBILE HEADER ================= -->
    <header
        class="fixed top-0 left-0 right-0 h-16 bg-white shadow-md flex items-center justify-between px-5 z-40 lg:hidden">

        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo_skarisa.png') }}" alt="Logo SMK Krian 1" class="w-8 h-8">
            <span class="font-bold text-blue-600 italic tracking-tight">
                Perpustakaan Sekolah
            </span>
        </div>

        <button @click="open = true" class="p-2 rounded-md hover:bg-gray-100 transition">
            <i class="ph ph-list text-2xl"></i>
        </button>
    </header>


    <!-- ================= OVERLAY ================= -->
    <div x-cloak x-show="open" x-transition.opacity @click="open=false"
        class="fixed inset-0 bg-black/40 z-40 lg:hidden">
    </div>


    <!-- ================= SIDEBAR ================= -->
    <aside x-cloak :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 h-screen w-64 bg-white shadow-xl z-50
               transform transition-transform duration-300 ease-in-out
               lg:translate-x-0">

        <!-- LOGO -->
        <div class="p-4 flex items-center justify-between border-b">
            <h2 class="text-lg font-bold text-blue-600 italic flex items-center gap-3">
                <img src="{{ asset('images/logo_skarisa.png') }}" alt="Logo SMK Krian 1" class="w-8 sm:w-10 h-8 sm:h-10">
                Perpustakaan Sekolah
            </h2>

            <button @click="open=false" class="lg:hidden text-gray-400 hover:text-black">
                <i class="ph ph-x text-2xl"></i>
            </button>
        </div>


        <!-- ================= MENU ================= -->
        <nav class="flex flex-col justify-between h-[calc(100%-90px)]">

            <div class="mt-4 space-y-1">

                @auth

                    {{-- ================= ADMIN ================= --}}
                    @if (auth()->user()->role === 'admin')
                        @php
                            $linkClass = 'flex items-center px-6 py-3 rounded-lg mx-3 transition';
                            $active = 'bg-blue-50 text-blue-600 font-semibold';
                            $normal = 'text-gray-600 hover:bg-gray-50 hover:text-blue-600';
                        @endphp

                        <a href="{{ route('Admin.dashboard') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('Admin.dashboard') ? $active : $normal }}">
                            <i class="ph ph-layout mr-3 text-lg"></i> Dashboard
                        </a>

                        <a href="{{ route('Admin.Book.indexBook') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('Admin.Book.indexBook') ? $active : $normal }}">
                            <i class="ph ph-books mr-3 text-lg"></i> Kelola Buku
                        </a>

                        <a href="{{ route('Admin.Transaction.indexTransaction') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('Admin.Transaction.indexTransaction') ? $active : $normal }}">
                            <i class="ph ph-arrows-left-right mr-3 text-lg"></i> Transaksi
                        </a>

                        <a href="{{ route('Admin.Member.indexMember') }}"
                            class="{{ $linkClass }} {{ request()->routeIs('Admin.Member.indexMember') ? $active : $normal }}">
                            <i class="ph ph-users mr-3 text-lg"></i> Anggota
                        </a>
                    @endif


                    {{-- ================= MEMBER ================= --}}
                    @if (auth()->user()->role === 'member')
                        <a href="{{ route('User.dashboard') }}"
                            class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                            <i class="ph ph-house-line mr-3"></i> Daftar Buku
                        </a>

                        <a href="{{ route('User.borrowBook') }}"
                            class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                            <i class="ph ph-hand-pointing mr-3"></i> Pinjam Buku
                        </a>

                        <a href="{{ route('User.history') }}"
                            class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                            <i class="ph ph-clock-counter-clockwise mr-3"></i> Riwayat
                        </a>
                    @endif

                @endauth
            </div>


            <!-- ================= LOGOUT ================= -->
            @auth
                <div class="p-6 border-t">
                    <form action="{{ route('Auth.logout') }}" method="POST">
                        @csrf
                        <button class="flex items-center w-full text-red-500 hover:text-red-700 font-medium transition">
                            <i class="ph ph-sign-out mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            @endauth

        </nav>
    </aside>
</div>
