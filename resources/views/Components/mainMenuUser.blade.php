<aside class="w-64 bg-white border-r border-gray-200 flex flex-col fixed h-full">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-blue-600 italic tracking-tighter flex items-center gap-2">
                <i class="ph-fill ph-book-open"></i>
                Perpustakaan
            </h2>
        </div>

        <nav class="flex-1 px-4 space-y-2">
            <a href="{{ route('User.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 text-blue-600 bg-blue-50 rounded-xl font-semibold transition-all">
                <i class="ph ph-house-line text-xl"></i>
                Daftar Buku
            </a>

            <a href="{{ route('User.borrowBook') }}"
               class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 hover:text-gray-900 rounded-xl transition-all">
                <i class="ph ph-hand-pointing text-xl"></i>
                Daftar Pinjam Buku
            </a>

            <a href="{{ route('User.history') }}"
               class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 hover:text-gray-900 rounded-xl transition-all">
                <i class="ph ph-clock-counter-clockwise text-xl"></i>
                Riwayat
            </a>
        </nav>

        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('Auth.logout') }}" method="POST">
                @csrf
                <button class="flex items-center gap-3 w-full px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all font-medium">
                    <i class="ph ph-sign-out text-xl"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>
