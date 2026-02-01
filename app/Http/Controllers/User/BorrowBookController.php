<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\Admin\TransactionModel;

class BorrowBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showIndexBorrow()
    {
        // Ambil transaksi berdasarkan id user & status 'Dipinjam', sertakan data user dan buku
        $borrowedBooks = TransactionModel::with(['user', 'book'])
            ->where('user_id', auth()->id())
            ->whereNull('tanggal_kembali')
            ->whereHas('book', function ($query) {
                $query->where('status', 'Dipinjam');
            })
            ->get();

        return view('User.borrowBook', compact('borrowedBooks'));
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
