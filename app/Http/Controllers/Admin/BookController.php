<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BookModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showIndexBook()
    {
        $books = BookModel::select('cover_buku', 'judul_buku', 'pengarang', 'penerbit', 'tahun_terbit', 'status')->get();
        return view('Admin.Book.indexBook', compact('books'));
    }
    public function showCreateBook()
    {
        return view('Admin.Book.createBook');
    }
    public function showEditBook() {
        return view('Admin.Book.editBook');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
