<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-11/12 max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo_skarisa.png') }}" alt="Logo SMK Krian 1" class="mx-auto mb-3 w-20 h-20"/>
            <h1 class="text-3xl font-bold text-blue-600">Login Perpustakaan</h1>
            <p class="text-gray-500">Silakan masuk ke akun Perpustakaan Anda</p>
        </div>

        <form action="{{ route('Auth.loginUser') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="nama@email.com">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="••••••••">
            </div>

            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            <button type="submit"
                class="w-full bg-blue-600 inline-block hover:bg-blue-700 text-white font-semibold py-2 rounded-md transition duration-200 text-center">
                Masuk
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-8">
            Belum punya akun?
            <a href="{{ route('Auth.register') }}" class="text-blue-600 font-semibold hover:underline">Daftar sekarang</a>
        </p>
    </div>

</body>
</html>
