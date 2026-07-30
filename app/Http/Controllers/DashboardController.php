<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absensi;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuru = Guru::count();

        $totalAbsensi = Absensi::whereDate('tanggal', today())->count();

        $belumAbsen = $totalGuru - $totalAbsensi;

        $totalTerlambat = Absensi::whereDate('tanggal', today())
            ->where('status', 'Terlambat')
            ->count();

        $totalPulang = Absensi::whereDate('tanggal', today())
            ->whereNotNull('jam_pulang')
            ->count();

        $masihDiSekolah = Absensi::whereDate('tanggal', today())
            ->whereNull('jam_pulang')
            ->count();

        $grafik = Absensi::select(
            DB::raw('DATE(tanggal) as tanggal'),
            DB::raw('COUNT(*) as total')
        )
        ->whereDate('tanggal', '>=', now()->subDays(6))
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();

        $statusChart = Absensi::select(
            'status',
            DB::raw('COUNT(*) as total')
        )
        ->whereDate('tanggal', today())
        ->groupBy('status')
        ->get();

        $guruBelumAbsen = Guru::whereDoesntHave('absensis', function ($q) {
            $q->whereDate('tanggal', today());
        })->get();

        $aktivitasHariIni = Absensi::with('guru')
            ->whereDate('tanggal', today())
            ->latest()
            ->take(8)
            ->get();

        $pengaturan = Pengaturan::first();

        return view('dashboard.index', compact(
            'totalGuru',
            'totalAbsensi',
            'belumAbsen',
            'totalTerlambat',
            'totalPulang',
            'masihDiSekolah',
            'grafik',
            'statusChart',
            'guruBelumAbsen',
            'aktivitasHariIni',
            'pengaturan'
        ));
    }
}