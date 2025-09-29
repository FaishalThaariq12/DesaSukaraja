<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = \App\Models\ProfilDesa::first();
        return view('admin.profil.index', compact('profil'));
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
    public function edit(string $id)
    {
        $profil = \App\Models\ProfilDesa::findOrFail($id);
        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profil = \App\Models\ProfilDesa::findOrFail($id);
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('profil', 'public');
            $validated['gambar'] = $path;
        }

        $profil->update($validated);
        return redirect()->route('admin.profil.index')->with('success', 'Profil desa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
