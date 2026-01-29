<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BookModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function showIndexBook()
    {
        $books = BookModel::select(
            'id',
            'cover_buku',
            'judul_buku',
            'pengarang',
            'penerbit',
            'tahun_terbit',
            'status'
        )->get();
        return view('Admin.Book.indexBook', compact('books'));
    }
    public function showCreateBook()
    {
        return view('Admin.Book.createBook');
    }
    public function showEditBook()
    {
        return view('Admin.Book.editBook');
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function createBook(Request $request)
    {
        $request->validate([
            'cover_buku' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'status' => 'required|string|max:50',
        ]);

        $coverName = null;
        if ($request->hasFile('cover_buku')) {
            $file = $request->file('cover_buku');
            $coverName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $coverName);
        }
        // if ($request->hasFile('cover_buku')) {
        //     $coverName = $request->file('cover_buku')->store('covers', 'public');
        //     $request->merge(['cover_buku' => $coverName]);
        // }


        BookModel::create([
            'cover_buku' => '/upload/' . $coverName,
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'status' => $request->status,
        ]);
        return redirect()->route('Admin.Book.indexBook')
            ->with('success', 'Buku berhasil ditambahkan.');
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
        // Cari data berdasarkan ID
        $book = BookModel::findOrFail($id);
        $book->delete();

        return Redirect::route('Admin.Book.indexBook')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
