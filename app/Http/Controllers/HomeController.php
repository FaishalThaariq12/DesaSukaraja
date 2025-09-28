<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $beritas = \App\Models\Berita::orderBy('created_at', 'desc')->take(3)->get();
    $galeris = \App\Models\Galeri::orderBy('created_at', 'desc')->take(6)->get();
    $wisatas = \App\Models\Wisata::orderBy('created_at', 'desc')->take(3)->get();
    $sotks = \App\Models\Sotk::orderBy('created_at', 'asc')->get();
    $pengaduanCount = \App\Models\Pengaduan::count();
    return view('public.beranda', compact('beritas', 'galeris', 'wisatas', 'sotks', 'pengaduanCount'));
  }

  public function beritaDetail($slug)
  {
    $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();
    return view('public.berita.detail', compact('berita'));
  }
}
