<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Pengaturan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $gurus = Guru::orderBy('nama')->get();

        $query = Absensi::with('guru');

        if ($request->filled('bulan')) {

            $query->whereMonth('tanggal', date('m', strtotime($request->bulan)))
                ->whereYear('tanggal', date('Y', strtotime($request->bulan)));

        }

        if ($request->filled('guru')) {

            $query->where('guru_id', $request->guru);

        }

        $absensis = $query->orderByDesc('tanggal')->get();

        $totalGuru = Guru::count();

        $totalAbsensi = $absensis->count();

        $totalHadir = $absensis->where('status', 'Hadir')->count();

        $totalTerlambat = $absensis->where('status', 'Terlambat')->count();

        $totalIzin = $absensis->whereIn('status', [
            'Izin',
            'Sakit',
        ])->count();

        return view('laporan.index', compact(
            'gurus',
            'absensis',
            'totalGuru',
            'totalAbsensi',
            'totalHadir',
            'totalTerlambat',
            'totalIzin'
        ));
    }

    public function exportPdf(Request $request)
    {
        $query = Absensi::with('guru');

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', date('m', strtotime($request->bulan)))
                ->whereYear('tanggal', date('Y', strtotime($request->bulan)));
        }

        if ($request->filled('guru')) {
            $query->where('guru_id', $request->guru);
        }

        $absensis = $query->orderByDesc('tanggal')->get();

        $pengaturan = Pengaturan::first();

        $totalGuru = Guru::count();

        $totalAbsensi = $absensis->count();

        $totalHadir = $absensis->where('status', 'Hadir')->count();

        $totalTerlambat = $absensis->where('status', 'Terlambat')->count();

        $totalIzin = $absensis->whereIn('status', [
            'Izin',
            'Sakit',
        ])->count();

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact(
                'absensis',
                'pengaturan',
                'totalGuru',
                'totalAbsensi',
                'totalHadir',
                'totalTerlambat',
                'totalIzin'
            )
        );

        return $pdf->download('laporan-absensi.pdf');
    }
}
