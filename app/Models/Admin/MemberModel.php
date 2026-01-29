<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
