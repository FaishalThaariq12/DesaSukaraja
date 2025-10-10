<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
  public function index()
  {
    $galeris = Galeri::orderBy('created_at', 'desc')->get();
    return view('admin.galeri.index', compact('galeris'));
  }
  public function create()
  {
    return view('admin.galeri.create');
  }
  public function store(Request $request)
  {
    $request->validate([
      'judul' => 'required',
      'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
      'fotos.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
      $gambarPath = $request->file('gambar')->store('galeri', 'public');
    }
    $galeri = Galeri::create([
      'judul' => $request->judul,
      'gambar' => $gambarPath,
      'deskripsi' => $request->deskripsi,
    ]);
    // Simpan foto-foto detail
    if ($request->hasFile('fotos')) {
      foreach ($request->file('fotos') as $foto) {
        $fotoPath = $foto->store('galeri_foto', 'public');
        $galeri->fotos()->create([
          'path' => $fotoPath,
          'caption' => $request->judul,
        ]);
      }
    }
    return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
  }
  public function edit($id)
  {
    $galeri = Galeri::findOrFail($id);
    return view('admin.galeri.edit', compact('galeri'));
  }
  public function update(Request $request, $id)
  {
    $galeri = Galeri::findOrFail($id);
    $request->validate([
      'judul' => 'required',
      'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
      'fotos.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    $gambarPath = $galeri->gambar;
    if ($request->hasFile('gambar')) {
      if ($gambarPath && Storage::disk('public')->exists($gambarPath)) {
        Storage::disk('public')->delete($gambarPath);
      }
      $gambarPath = $request->file('gambar')->store('galeri', 'public');
    }
    $galeri->update([
      'judul' => $request->judul,
      'gambar' => $gambarPath,
      'deskripsi' => $request->deskripsi,
    ]);
    // Simpan foto-foto detail baru
    if ($request->hasFile('fotos')) {
      foreach ($request->file('fotos') as $foto) {
        $fotoPath = $foto->store('galeri_foto', 'public');
        $galeri->fotos()->create([
          'path' => $fotoPath,
          'caption' => $request->judul,
        ]);
      }
    }
    return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupdate');
  }
  public function destroy($id)
  {
    $galeri = Galeri::findOrFail($id);
    $galeri->delete();
    return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus');
  }
}
