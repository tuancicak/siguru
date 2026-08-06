<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $fillable = [

        'nama_sekolah',

        'alamat',

        'telepon',

        'email',

        'website',

        'logo',

        'jam_masuk',

        'jam_pulang',

        'batas_terlambat',

        'latitude',

        'longitude',

        'radius',

        'use_gps',

        'use_selfie',

        'use_device',

        'use_working_hours',

    ];
}
