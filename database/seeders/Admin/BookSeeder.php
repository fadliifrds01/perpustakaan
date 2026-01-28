<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\BookModel as AdminBookModel;
use Illuminate\Database\Seeder;
use App\Models\BookModel;

// PS C:\laragon\www\perpustakaan> php artisan db:seed --class="Database\Seeders\Admin\BookSeeder"

class BookSeeder extends Seeder
{
    public function run(): void
    {
        AdminBookModel::insert([
            [
                'cover_buku' => 'upload/buku1.jpg',
                'judul_buku' => 'Pemrograman PHP untuk Pemula',
                'pengarang' => 'Andi Susanto',
                'penerbit' => 'Elex Media Komputindo',
                'tahun_terbit' => 2020,
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cover_buku' => 'upload/buku2.jpg',
                'judul_buku' => 'Belajar Laravel dari Nol',
                'pengarang' => 'Siti Aminah',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2021,
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
