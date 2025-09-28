<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sotk;

class SotkController extends Controller
{
  public function index()
  {
    $sotks = Sotk::orderBy('jabatan')->get();
    return view('admin.sotk.index', compact('sotks'));
  }
  public function create()
  {
    return view('admin.sotk.create');
  }
  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'jabatan' => 'required',
    ]);
    Sotk::create($request->all());
    return redirect()->route('admin.sotk.index')->with('success', 'SOTK berhasil ditambahkan');
  }
  public function edit($id)
  {
    $sotk = Sotk::findOrFail($id);
    return view('admin.sotk.edit', compact('sotk'));
  }
  public function update(Request $request, $id)
  {
    $sotk = Sotk::findOrFail($id);
    $sotk->update($request->all());
    return redirect()->route('admin.sotk.index')->with('success', 'SOTK berhasil diupdate');
  }
  public function destroy($id)
  {
    $sotk = Sotk::findOrFail($id);
    $sotk->delete();
    return redirect()->route('admin.sotk.index')->with('success', 'SOTK berhasil dihapus');
  }
}
