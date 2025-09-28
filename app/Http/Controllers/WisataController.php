<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class WisataController extends Controller
{
  public function index()
  {
    $wisatas = Wisata::orderBy('created_at', 'desc')->get();
    return view('public.wisata.index', compact('wisatas'));
  }
}
