<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $fillable = [
        'guru_id',
        'tanggal',
        'keterangan',
        'jam_masuk',
        'jam_pulang',
        'status',
        'latitude',
        'longitude',
    ];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }
}