<?php

namespace App\Http\Controllers;

use App\Helpers\LocationHelper;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Absensi;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GuruDashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::where('user_id', Auth::id())->first();

        $absensiHariIni = null;

        if ($guru) {
            $absensiHariIni = Absensi::where('guru_id', $guru->id)
                ->whereDate('tanggal', today())
                ->first();
        }

        $totalHadir = 0;
        $totalTerlambat = 0;

        if ($guru) {

            $totalHadir = Absensi::where('guru_id', $guru->id)
                ->where('status', 'Hadir')
                ->count();

            $totalTerlambat = Absensi::where('guru_id', $guru->id)
                ->where('status', 'Terlambat')
                ->count();

        }

        $totalHadir = Absensi::where('guru_id', $guru->id)
            ->where('status', 'Hadir')
            ->count();

        $totalTerlambat = Absensi::where('guru_id', $guru->id)
            ->where('status', 'Terlambat')
            ->count();

        $riwayat = [];

        if ($guru) {

            $riwayat = Absensi::where('guru_id', $guru->id)
                ->latest('tanggal')
                ->take(5)
                ->get();

        }

        return view('guru.dashboard', compact(
            'absensiHariIni',
            'riwayat',
            'totalHadir',
            'totalTerlambat'
        ));
    }

   public function absenMasuk(\Illuminate\Http\Request $request)
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
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return back()->with(
            'success',
            "Absen masuk berhasil. Status Anda: {$status}"
        );
    }

        public function absenPulang()
    {
        $guru = Guru::where('user_id', Auth::id())->first();

        if (!$guru) {
            return back()->with('error', 'Data guru tidak ditemukan.');
        }

        $absensi = Absensi::where('guru_id', $guru->id)
            ->whereDate('tanggal', today())
            ->first();

        if (!$absensi) {
            return back()->with('error', 'Silakan absen masuk terlebih dahulu.');
        }

        if ($absensi->jam_pulang) {
            return back()->with('error', 'Anda sudah melakukan absen pulang.');
        }

        $absensi->update([
            'jam_pulang' => Carbon::now()->format('H:i:s')
        ]);

        return back()->with(
            'success',
            'Absen pulang berhasil.'
        );
    }
}