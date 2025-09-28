<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
  public function index()
  {
    return view('public.pengaduan.index');
  }
  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'email' => 'required|email',
      'isi' => 'required',
    ]);
    Pengaduan::create([
      'nama' => $request->nama,
      'email' => $request->email,
      'isi' => $request->isi,
      'status' => 'baru',
    ]);
    return back()->with('success', 'Pengaduan berhasil dikirim');
  }
}
