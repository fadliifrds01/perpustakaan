<div x-data="{ open: false }">
    <header
        class="fixed top-0 left-0 right-0 h-16 bg-white shadow-md flex items-center justify-between px-6 z-40 lg:hidden">
        <div class="flex items-center gap-2">
            <i class="ph-fill ph-book-open text-blue-600 text-2xl"></i>
            <span class="font-bold text-blue-600 italic tracking-tighter">Perpustakaan</span>
        </div>
        <button @click="open = true" class="p-2 text-gray-600 hover:bg-gray-100 rounded-md">
            <i class="ph ph-list text-2xl"></i>
        </button>
    </header>

    <div x-show="open" x-transition:opacity @click="open = false" class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        style="display: none;">
    </div>

    <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 h-screen w-64 bg-white shadow-md z-50 transform lg:translate-x-0 transition-transform duration-300 ease-in-out">

        <div class="p-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-blue-600 italic tracking-tighter flex items-center gap-2">
                <i class="ph-fill ph-book-open"></i>
                Perpustakaan
            </h2>
            <button @click="open = false" class="lg:hidden text-gray-400 hover:text-red-500">
                <i class="ph ph-x text-2xl"></i>
            </button>
        </div>

        <nav class="mt-4">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('Admin.dashboard') }}"
                    class="flex items-center px-6 py-3 {{ request()->routeIs('Admin.dashboard') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-all' }}">
                    <i class="ph ph-layout text-xl mr-3"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('Admin.Book.indexBook') }}"
                    class="flex items-center px-6 py-3 {{ request()->routeIs('Admin.Book.indexBook') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-all' }}">
                    <i class="ph ph-books text-xl mr-3"></i>
                    <span class="font-semibold">Kelola Data Buku</span>
                </a>
                <a href="{{ route('Admin.Transaction.indexTransaction') }}"
                    class="flex items-center px-6 py-3 {{ request()->routeIs('Admin.Transaction.indexTransaction') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-all' }}">
                    <i class="ph ph-arrows-left-right text-xl mr-3"></i>
                    <span>Transaksi</span>
                </a>
                <a href="{{ route('Admin.Member.indexMember') }}"
                    class="flex items-center px-6 py-3 {{ request()->routeIs('Admin.Member.indexMember') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-all' }}">
                    <i class="ph ph-users text-xl mr-3"></i>
                    <span>Kelola Anggota</span>
                </a>
            @endif

            @if (auth()->user()->role === 'member')
                <a href="{{ route('User.dashboard') }}"
                    class="flex items-center px-6 py-3 {{ request()->routeIs('User.dashboard') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-all' }}">
                    <i class="ph ph-house-line text-xl mr-3"></i>
                    <span>Daftar Buku</span>
                </a>
                <a href="{{ route('User.borrowBook') }}"
                    class="flex items-center px-6 py-3 {{ request()->routeIs('User.borrowBook') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-all' }}">
                    <i class="ph ph-hand-pointing text-xl mr-3"></i>
                    <span>Daftar Pinjam</span>
                </a>
                <a href="{{ route('User.history') }}"
                    class="flex items-center px-6 py-3 {{ request()->routeIs('User.history') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-all' }}">
                    <i class="ph ph-clock-counter-clockwise text-xl mr-3"></i>
                    <span>Riwayat</span>
                </a>
            @endif

            <div class="mt-10 px-6">
                <form action="{{ route('Auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center text-red-500 hover:text-red-700 font-medium transition-colors">
                        <i class="ph ph-sign-out text-xl mr-3"></i>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>
</div>
