<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\FotoGaleri;
use Illuminate\Support\Facades\Storage;

class FotoGaleriController extends Controller
{
  public function index($galeri)
  {
    $galeri = Galeri::with('fotos')->findOrFail($galeri);
    return view('admin.galeri.foto.index', compact('galeri'));
  }

  public function create($galeri)
  {
    $galeri = Galeri::findOrFail($galeri);
    return view('admin.galeri.foto.create', compact('galeri'));
  }

  public function store(Request $request, $galeri)
  {
    $galeri = Galeri::findOrFail($galeri);
    $request->validate([
      'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
      'caption' => 'nullable|string|max:255',
    ]);
    $fotoPath = $request->file('foto')->store('galeri_foto', 'public');
    $galeri->fotos()->create([
      'path' => $fotoPath,
      'caption' => $request->caption,
    ]);
    return redirect()->route('admin.galeri.foto.index', $galeri->id)->with('success', 'Foto berhasil ditambahkan');
  }

  public function edit($fotoGaleri)
  {
    $foto = FotoGaleri::findOrFail($fotoGaleri);
    return view('admin.galeri.foto.edit', compact('foto'));
  }

  public function update(Request $request, $fotoGaleri)
  {
    $foto = FotoGaleri::findOrFail($fotoGaleri);
    $request->validate([
      'caption' => 'nullable|string|max:255',
      'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    if ($request->hasFile('foto')) {
      if ($foto->path && Storage::disk('public')->exists($foto->path)) {
        Storage::disk('public')->delete($foto->path);
      }
      $foto->path = $request->file('foto')->store('galeri_foto', 'public');
    }
    $foto->caption = $request->caption;
    $foto->save();
    return redirect()->route('admin.galeri.foto.index', $foto->galeri_id)->with('success', 'Foto berhasil diupdate');
  }

  public function destroy($fotoGaleri)
  {
    $foto = FotoGaleri::findOrFail($fotoGaleri);
    $galeriId = $foto->galeri_id;
    if ($foto->path && Storage::disk('public')->exists($foto->path)) {
      Storage::disk('public')->delete($foto->path);
    }
    $foto->delete();
    return redirect()->route('admin.galeri.foto.index', $galeriId)->with('success', 'Foto berhasil dihapus');
  }
}
