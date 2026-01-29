<div class="space-y-4">

    {{-- ✅ Pesan Sukses --}}
    @if (session('success'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 3000)"
            class="flex items-center gap-3 p-4 rounded-xl m-2 bg-green-100 border border-green-300 shadow-md text-green-800">

            {{-- Icon --}}
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0a10 10 0 100 20A10 10 0 0010 0zm-1 14l-4-4 1.4-1.4L9 11.2l4.6-4.6L15 8l-6 6z"/>
            </svg>

            {{-- Text --}}
            <span class="flex-1 text-sm font-medium">
                {{ session('success') }}
            </span>

            {{-- Close --}}
            <button @click="show=false" class="text-green-700 hover:text-green-900 text-lg font-bold">
                ✕
            </button>
        </div>
    @endif



    {{-- ❌ Pesan Error --}}
    @if ($errors->any())
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition
            class="p-4 rounded-xl bg-red-100 border border-red-300 shadow-md text-red-800">

            <div class="flex justify-between items-start">
                <span class="font-semibold">Oops! Terjadi kesalahan:</span>

                <button @click="show=false" class="text-red-700 hover:text-red-900 text-lg font-bold">
                    ✕
                </button>
            </div>

            <ul class="mt-2 list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
