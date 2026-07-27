<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $absensis = Absensi::with('guru')
        ->latest('tanggal')
        ->get();

    return view('absensi.index', compact('absensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        return view('absensi.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Absensi $absensi)
    {
    $request->validate([
        'jam_masuk'  => 'nullable',
        'jam_pulang' => 'nullable',
        'status' => 'required|in:Hadir,Terlambat,Izin,Sakit,Alfa',
    ]);

    $absensi->update([
        'jam_masuk'  => $request->jam_masuk,
        'jam_pulang' => $request->jam_pulang,
        'status'     => $request->status,
    ]);

    return redirect()
        ->route('absensi.index')
        ->with('success', 'Data absensi berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
