<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
    $pengaturan = Pengaturan::first();

    return view('pengaturan.index', compact('pengaturan'));
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
        $request->validate([
            'nama_sekolah'     => 'required',
            'jam_masuk'        => 'required',
            'jam_pulang'       => 'required',
            'batas_terlambat'  => 'required',
        ]);

        Pengaturan::updateOrCreate(
            ['id' => 1],
            [
                'nama_sekolah'    => $request->nama_sekolah,
                'jam_masuk'       => $request->jam_masuk,
                'jam_pulang'      => $request->jam_pulang,
                'batas_terlambat' => $request->batas_terlambat,
            ]
        );

        return redirect()
            ->route('pengaturan.index')
            ->with('success', 'Pengaturan berhasil disimpan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaturan $pengaturan)
    {
        //
    }
}
