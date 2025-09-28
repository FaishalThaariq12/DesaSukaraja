<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
  public function index()
  {
    $pengaduans = Pengaduan::orderBy('created_at', 'desc')->get();
    return view('admin.pengaduan.index', compact('pengaduans'));
  }
  public function show($id)
  {
    $pengaduan = Pengaduan::findOrFail($id);
    return view('admin.pengaduan.show', compact('pengaduan'));
  }
  public function destroy($id)
  {
    $pengaduan = Pengaduan::findOrFail($id);
    $pengaduan->delete();
    return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil dihapus');
  }
}
