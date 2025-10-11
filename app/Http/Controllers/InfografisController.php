<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class InfografisController extends Controller
{
  public function index()
  {
    // Ambil semua data penduduk per dusun, urutkan nama dusun
    $data = Penduduk::orderBy('dusun')->get();
    return view('public.infografis.index', compact('data'));
  }
}
