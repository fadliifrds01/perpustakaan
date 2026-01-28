<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $table = 'book';

    protected $fillable = [
        'cover_buku',
        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'status',
    ];
}
