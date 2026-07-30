<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $gurus = Guru::all();

    return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuruRequest $request)
    {
        // Simpan akun user
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        // Simpan data guru
        Guru::create([
            'user_id' => $user->id,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'qr_code' => Str::uuid(),
        ]);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
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
    public function edit(string $id)
    {
    $guru = Guru::with('user')->findOrFail($id);

    return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateGuruRequest $request, string $id)
{
    $guru = Guru::with('user')->findOrFail($id);

    // Update user
    $guru->user->update([
        'name' => $request->nama,
        'email' => $request->email,
    ]);

    // Update password jika diisi
    if ($request->filled('password')) {
        $guru->user->password = Hash::make($request->password);
        $guru->user->save();
    }

    // Update data guru
    $guru->update([
        'nip' => $request->nip,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()
        ->route('guru.index')
        ->with('success', 'Data guru berhasil diperbarui.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $guru = Guru::with('user')->findOrFail($id);

    // Hapus akun user (data guru ikut terhapus karena cascadeOnDelete)
    $guru->user->delete();

    return redirect()
        ->route('guru.index')
        ->with('success', 'Data guru berhasil dihapus.');
}

public function qrcode(Guru $guru)
{
    if (!$guru->qr_code) {
        $guru->update([
            'qr_code' => Str::uuid(),
        ]);
    }

    return view('guru.qrcode', compact('guru'));
}
}
