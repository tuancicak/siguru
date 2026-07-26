<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $fillable = [

        'nama_sekolah',

        'jam_masuk',

        'jam_pulang',

        'batas_terlambat',

    ];
}