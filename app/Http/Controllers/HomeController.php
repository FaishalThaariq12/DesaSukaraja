<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function beritaIndex()
  {
    $beritas = \App\Models\Berita::orderBy('created_at', 'desc')->paginate(6);
    return view('public.berita.index', compact('beritas'));
  }
  public function index()
  {
    $beritas = \App\Models\Berita::orderBy('created_at', 'desc')->take(3)->get();
    $galeris = \App\Models\Galeri::orderBy('created_at', 'desc')->take(6)->get();
    $wisatas = \App\Models\Wisata::orderBy('created_at', 'desc')->take(3)->get();
    $sotks = \App\Models\Sotk::orderBy('created_at', 'asc')->get();
    $pengaduanCount = \App\Models\Pengaduan::count();
    $profil = \App\Models\ProfilDesa::first();
    return view('public.beranda', compact('beritas', 'galeris', 'wisatas', 'sotks', 'pengaduanCount', 'profil'));
  }

  public function beritaDetail($slug)
  {
    $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();
    $beritaTerbaru = \App\Models\Berita::where('id', '!=', $berita->id)->orderBy('created_at', 'desc')->take(5)->get();
    return view('public.berita.detail', compact('berita', 'beritaTerbaru'));
  }

  public function profilSejarah()
  {
    $profil = \App\Models\ProfilDesa::first();
    return view('public.profil.sejarah', compact('profil'));
  }

  public function profilVisiMisi()
  {
    $profil = \App\Models\ProfilDesa::first();
    return view('public.profil.visimisi', compact('profil'));
  }
}
