<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

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
      'gambar' => 'required',
    ]);
    Galeri::create($request->all());
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
    $galeri->update($request->all());
    return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupdate');
  }
  public function destroy($id)
  {
    $galeri = Galeri::findOrFail($id);
    $galeri->delete();
    return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus');
  }
}
