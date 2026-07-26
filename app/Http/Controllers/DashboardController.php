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

    $totalAbsensi = Absensi::whereDate('created_at', today())->count();

    $totalTerlambat = Absensi::whereDate('created_at', today())
        ->where('status', 'terlambat')
        ->count();

    $pengaturan = Pengaturan::first();

    return view('dashboard.index', compact(
        'totalGuru',
        'totalAbsensi',
        'totalTerlambat',
        'pengaturan'
    ));
    }
}