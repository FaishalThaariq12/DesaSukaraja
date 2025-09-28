<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
  public function index()
  {
    $beritas = Berita::orderBy('created_at', 'desc')->get();
    return view('admin.berita.index', compact('beritas'));
  }

  public function create()
  {
    return view('admin.berita.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'judul' => 'required',
      'isi' => 'required',
      'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    $slug = Str::slug($request->judul);
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
      $gambarPath = $request->file('gambar')->store('berita', 'public');
    }
    Berita::create([
      'judul' => $request->judul,
      'slug' => $slug,
      'isi' => $request->isi,
      'gambar' => $gambarPath,
    ]);
    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
  }

  public function edit($id)
  {
    $berita = Berita::findOrFail($id);
    return view('admin.berita.edit', compact('berita'));
  }

  public function update(Request $request, $id)
  {
    $berita = Berita::findOrFail($id);
    $request->validate([
      'judul' => 'required',
      'isi' => 'required',
    ]);
    $slug = Str::slug($request->judul);
    $berita->update([
      'judul' => $request->judul,
      'slug' => $slug,
      'isi' => $request->isi,
      'gambar' => $request->gambar ?? null,
    ]);
    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate');
  }

  public function destroy($id)
  {
    $berita = Berita::findOrFail($id);
    $berita->delete();
    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
  }
}
