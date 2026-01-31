<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TransactionModel;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showIndexHistory()
    {
        // Ambil transaksi berdasarkan id user & tanggal dikembalikan sudah terisi, sertakan data user dan buku
        $historyBorroweds = TransactionModel::with(['user', 'book'])
            ->where('user_id', auth()->id())
            ->whereNotNull('tanggal_kembali')
            ->get();
        return view('User.historyBook', compact('historyBorroweds'));
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
