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
        'nama_sekolah'    => 'required',
        'alamat'          => 'nullable',
        'telepon'         => 'nullable',
        'email'           => 'nullable|email',
        'website'         => 'nullable',
        'logo'            => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        'jam_masuk'       => 'required',
        'jam_pulang'      => 'nullable',
        'batas_terlambat' => 'required',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'radius' => 'required|integer|min:10|max:1000',

        'use_gps' => 'nullable',
        'use_selfie' => 'nullable',
        'use_device' => 'nullable',
        'use_working_hours' => 'nullable',
    ]);

        $pengaturan = Pengaturan::first();

        $logo = $pengaturan->logo ?? null;

        if ($request->hasFile('logo')) {

            $logo = $request->file('logo')->store(
                'logo-sekolah',
                'public'
            );

        }

        Pengaturan::updateOrCreate(
            ['id' => 1],
            [
                'nama_sekolah'    => $request->nama_sekolah,
                'alamat'          => $request->alamat,
                'telepon'         => $request->telepon,
                'email'           => $request->email,
                'website'         => $request->website,
                'logo'            => $logo,
                'jam_masuk'       => $request->jam_masuk,
                'jam_pulang'      => $request->jam_pulang,
                'batas_terlambat' => $request->batas_terlambat,

                // ===== Keamanan Absensi =====
                'latitude'         => $request->latitude,
                'longitude'        => $request->longitude,
                'radius'           => $request->radius,
                'use_gps'          => $request->has('use_gps'),
                'use_selfie'       => $request->has('use_selfie'),
                'use_device'       => $request->has('use_device'),
                'use_working_hours'=> $request->has('use_working_hours'),
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
