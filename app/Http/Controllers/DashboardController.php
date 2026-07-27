<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absensi;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    $totalGuru = Guru::count();

    $totalAbsensi = Absensi::whereDate('tanggal', today())->count();

    $totalTerlambat = Absensi::whereDate('tanggal', today())
        ->where('status', 'Terlambat')
        ->count();

    $totalPulang = Absensi::whereDate('tanggal', today())
        ->whereNotNull('jam_pulang')
        ->count();

    $masihDiSekolah = Absensi::whereDate('tanggal', today())
        ->whereNull('jam_pulang')
        ->count();

    $pengaturan = Pengaturan::first();

    return view('dashboard.index', compact(
        'totalGuru',
        'totalAbsensi',
        'totalTerlambat',
        'totalPulang',
        'masihDiSekolah',
        'pengaturan'
    ));
    }
}