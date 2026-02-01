<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TransactionModel;
use App\Models\Admin\BookModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class TransactionController extends Controller
{
    public function showIndexTransaction()
    {
        // dd(TransactionModel::with(['users','book'])->first());
        $transactions = TransactionModel::with(['user', 'book'])->get();

        return view('Admin.Transaction.indexTransaction', compact('transactions'));
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
        // temukan data buku berdasarkan id
        $book = BookModel::findOrFail($request->book_id);

        // Jika menggunakan stok
        /*
        // Cek ketersediaan stok
        if ($book->stock <= 0) {
            return back()->with('error', 'Stok buku sedang habis!');
        }
        */

        // 1. Catat transaksi
        TransactionModel::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => now()
        ]);
    
        // Jika menggunakan stok
        /*
        // 2. Kurangi stok buku
        $book->decrement('stock');
        */

        // ubah status buku jadi Dipinjam
        $book->update([
            'status'       => 'Dipinjam',
        ]);

        return redirect()->route('User.dashboard')->with('success', 'Buku berhasil dipinjam!');
    }

    public function returnBook($id, Request $request)
    {
        // Cari data transaksi
        $transaction = TransactionModel::findOrFail($id);
        // Cari data buku
        $book = BookModel::findOrFail($request->book_id);

        // Cek buku sudah dikembalikan
        if ($book->status === 'Tersedia') {
            return back()->with('error', 'Buku ini sudah dikembalikan sebelumnya.');
        }

        // Update tanggal dikembalikan di tabel Transaction
        $transaction->update([
            'tanggal_kembali' => now() // Mencatat tanggal kembali asli
        ]);

        // Update status di tabel Book (Otomatis jadi tersedia)
        $transaction->book->update([
            'status' => 'Tersedia'
        ]);

        // Opsi tambahan: Tambahkan stok kembali jika Anda menggunakan sistem stok
        // $transaction->book->increment('stock');

        return back()->with('success', 'Buku telah berhasil dikembalikan!');
    }

    public function storeAgain(Request $request)
    {
        // temukan data buku berdasarkan id
        $book = BookModel::findOrFail($request->book_id);

        // Jika menggunakan stok
        /*
        // Cek ketersediaan stok
        if ($book->stock <= 0) {
            return back()->with('error', 'Stok buku sedang habis!');
        }
        */

        // 1. Catat transaksi
        TransactionModel::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => now()
        ]);
    
        // Jika menggunakan stok
        /*
        // 2. Kurangi stok buku
        $book->decrement('stock');
        */

        // ubah status buku jadi Dipinjam
        $book->update([
            'status'       => 'Dipinjam',
        ]);

        return redirect()->route('User.history')->with('success', 'Buku berhasil dipinjam lagi!');
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
