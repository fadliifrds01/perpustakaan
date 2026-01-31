<aside class="fixed top-0 left-0 h-screen w-64 bg-white shadow-md">
    <div class="p-6">
        <h2 class="text-2xl font-bold text-blue-600 italic tracking-tighter flex items-center gap-2">
            <i class="ph-fill ph-book-open"></i>
            Perpustakaan
        </h2>
    </div>
    <nav class="mt-4">
        <!-- MENU UNTUK ADMIN -->
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('Admin.dashboard') }}"
                class="flex items-center px-6 py-3 {{ request()->routeIs('Admin.dashboard') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in' }}">
                <i class="ph ph-layout text-xl mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('Admin.Book.indexBook') }}"
                class="flex items-center px-6 py-3 {{ request()->routeIs('Admin.Book.indexBook') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in' }}">
                <i class="ph ph-books text-xl mr-3"></i>
                <span class="font-semibold">Kelola Data Buku</span>
            </a>
            <a href="{{ route('Admin.Transaction.indexTransaction') }}"
                class="flex items-center px-6 py-3 {{ request()->routeIs('Admin.Transaction.indexTransaction') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in' }}">
                <i class="ph ph-arrows-left-right text-xl mr-3"></i>
                <span>Transaksi</span>
            </a>
            <a href="{{ route('Admin.Member.indexMember') }}"
                class="flex items-center px-6 py-3 {{ request()->routeIs('Admin.Member.indexMember') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in' }}">
                <i class="ph ph-users text-xl mr-3"></i>
                <span>Kelola Anggota</span>
            </a>
        @endif

        <!-- MENU UNTUK MEMBER -->
        @if(auth()->user()->role === 'member')
            <a href="{{ route('User.dashboard') }}"
                class="flex items-center px-6 py-3 {{ request()->routeIs('User.dashboard') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in' }}">
                <i class="ph ph-house-line text-xl"></i>
                Daftar Buku
            </a>
            <a href="{{ route('User.borrowBook') }}"
                class="flex items-center px-6 py-3 {{ request()->routeIs('User.borrowBook') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in' }}">
                <i class="ph ph-hand-pointing text-xl"></i>
                Daftar Pinjam Buku
            </a>
            <a href="{{ route('User.history') }}"
                class="flex items-center px-6 py-3 {{ request()->routeIs('User.history') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 transition-colors duration-100 ease-in' }}">
                <i class="ph ph-clock-counter-clockwise text-xl"></i>
                Riwayat
            </a>
        @endif

        <div class="mt-10 px-6">
            <form action="{{ route('Auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center text-red-500 hover:text-red-700 font-medium">
                    <i class="ph ph-sign-out text-xl mr-3"></i>
                    Logout
                </button>
            </form>
        </div>
    </nav>
</aside>
