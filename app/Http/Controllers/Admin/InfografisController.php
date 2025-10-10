<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infografis;
use Illuminate\Support\Facades\Storage;

class InfografisController extends Controller
{
  public function index()
  {
    $infografis = Infografis::latest()->paginate(10);
    return view('admin.infografis.index', compact('infografis'));
  }

  public function create()
  {
    return view('admin.infografis.create');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'judul' => 'required',
      'slug' => 'required|unique:infografis,slug',
      'deskripsi' => 'required',
      'gambar' => 'nullable|image',
      'kategori' => 'nullable|string',
    ]);
    if ($request->hasFile('gambar')) {
      $data['gambar'] = $request->file('gambar')->store('infografis', 'public');
    }
    Infografis::create($data);
    return redirect()->route('admin.infografis.index')->with('success', 'Infografis berhasil ditambahkan.');
  }

  public function edit(Infografis $infografis)
  {
    return view('admin.infografis.edit', compact('infografis'));
  }

  public function update(Request $request, Infografis $infografis)
  {
    $data = $request->validate([
      'judul' => 'required',
      'slug' => 'required|unique:infografis,slug,' . $infografis->id,
      'deskripsi' => 'required',
      'gambar' => 'nullable|image',
      'kategori' => 'nullable|string',
    ]);
    if ($request->hasFile('gambar')) {
      $data['gambar'] = $request->file('gambar')->store('infografis', 'public');
    }
    $infografis->update($data);
    return redirect()->route('admin.infografis.index')->with('success', 'Infografis berhasil diupdate.');
  }

  public function destroy(Infografis $infografis)
  {
    if ($infografis->gambar) {
      Storage::disk('public')->delete($infografis->gambar);
    }
    $infografis->delete();
    return redirect()->route('admin.infografis.index')->with('success', 'Infografis berhasil dihapus.');
  }
}
