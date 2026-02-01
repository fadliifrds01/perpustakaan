<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showController()
    {
        return view('Auth.login');
    }

    // untuk login
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ambil user yang baru saja login
            $user = Auth::user();

            // Kondisi pengalihan berdasarkan kolom 'role' di database
            if ($user->role === 'admin') {
                // jika role admin arahkan ke halaman dashboar admin
                return redirect()->intended(route('Admin.dashboard'));
            } 
            // jika role selain admin, maka arahkan ke halaman dashboard user / member
            return redirect()->intended(route('User.dashboard'));
        }

        // jika email / password salah
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // untuk logout
    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus status login user

        $request->session()->invalidate(); // Mematikan session yang sedang berjalan
        $request->session()->regenerateToken(); // Mencegah serangan CSRF

        return redirect('/'); // Arahkan kembali ke halaman login
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
