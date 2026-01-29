<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BookModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * LIST DATA
     */
    public function showIndexBook()
    {
        $books = BookModel::all();

        return view('Admin.Book.indexBook', compact('books'));
    }


    /**
     * FORM CREATE
     */
    public function showCreateBook()
    {
        return view('Admin.Book.createBook');
    }


    /**
     * STORE DATA
     */
    public function createBook(Request $request)
    {
        $request->validate([
            'cover_buku'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_buku'   => 'required|string|max:255',
            'pengarang'    => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'status'       => 'required|string|max:50',
        ]);

        $coverName = null;

        if ($request->hasFile('cover_buku')) {
            $file = $request->file('cover_buku');
            $coverName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $coverName);
        }

        BookModel::create([
            'cover_buku'   => $coverName ? '/upload/' . $coverName : null,
            'judul_buku'   => $request->judul_buku,
            'pengarang'    => $request->pengarang,
            'penerbit'     => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'status'       => $request->status,
        ]);

        return redirect()->route('Admin.Book.indexBook')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * FORM EDIT
     */
    public function showEditBook($id)
    {
        $book = BookModel::findOrFail($id);

        return view('Admin.Book.editBook', compact('book'));
    }

    // Logika update book
    public function updateBook(Request $request, $id)
    {
        $request->validate([
            'cover_buku'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_buku'   => 'required|string|max:255',
            'pengarang'    => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'status'       => 'required|string|max:50',
        ]);

        $book = BookModel::findOrFail($id);

        if ($request->hasFile('cover_buku')) {
            $file = $request->file('cover_buku');
            $coverName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $coverName);

            $book->cover_buku = '/upload/' . $coverName;
        }

        $book->update([
            'judul_buku'   => $request->judul_buku,
            'pengarang'    => $request->pengarang,
            'penerbit'     => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'status'       => $request->status,
        ]);

        return redirect()->route('Admin.Book.indexBook')
            ->with('success', 'Buku berhasil diperbarui');
    }


    // Logika delete book
    public function destroy($id)
    {
        $book = BookModel::findOrFail($id);
        $book->delete();

        return Redirect::route('Admin.Book.indexBook')
            ->with('success', 'Buku berhasil dihapus');
    }
}
