<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{
  public function index()
  {
    $wisatas = Wisata::orderBy('created_at', 'desc')->get();
    return view('admin.wisata.index', compact('wisatas'));
  }
  public function create()
  {
    return view('admin.wisata.create');
  }
  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'slug' => 'required',
      'deskripsi' => 'required',
    ]);
    Wisata::create($request->all());
    return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil ditambahkan');
  }
  public function edit($id)
  {
    $wisata = Wisata::findOrFail($id);
    return view('admin.wisata.edit', compact('wisata'));
  }
  public function update(Request $request, $id)
  {
    $wisata = Wisata::findOrFail($id);
    $wisata->update($request->all());
    return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil diupdate');
  }
  public function destroy($id)
  {
    $wisata = Wisata::findOrFail($id);
    $wisata->delete();
    return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil dihapus');
  }
}
