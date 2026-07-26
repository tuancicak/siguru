<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absensi;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GuruDashboardController extends Controller
{
    public function index()
    {
        return view('guru.dashboard');
    }

    public function absenMasuk()
    {
        $guru = Guru::where('user_id', Auth::id())->first();

        if (!$guru) {
            return back()->with('error', 'Data guru tidak ditemukan.');
        }

        // Cek apakah sudah absen hari ini
        $sudahAbsen = Absensi::where('guru_id', $guru->id)
            ->whereDate('tanggal', today())
            ->exists();

        if ($sudahAbsen) {
            return back()->with('error', 'Anda sudah melakukan absen hari ini.');
        }

        $pengaturan = Pengaturan::first();

        $jamSekarang = Carbon::now()->format('H:i:s');

        $status = Carbon::parse($jamSekarang)
            ->greaterThan(Carbon::parse($pengaturan->batas_terlambat))
                ? 'Terlambat'
                : 'Hadir';

        Absensi::create([
            'guru_id'     => $guru->id,
            'tanggal'     => today(),
            'jam_masuk'   => $jamSekarang,
            'status'      => $status,
            'keterangan'  => null,
        ]);

        return back()->with(
            'success',
            "Absen masuk berhasil. Status Anda: {$status}"
        );
    }
}