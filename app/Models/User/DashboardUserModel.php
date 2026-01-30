<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class DashboardUserModel extends Model
{
    protected $table = 'book';

    protected $fillable = [
        'judul_buku',
        'cover_buku',
    ];
}
