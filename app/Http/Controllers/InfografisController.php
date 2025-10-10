<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infografis;

class InfografisController extends Controller
{
  public function index()
  {
    $infografis = Infografis::latest()->paginate(10);
    return view('public.infografis.index', compact('infografis'));
  }

  public function detail($slug)
  {
    $infografis = Infografis::where('slug', $slug)->firstOrFail();
    return view('public.infografis.detail', compact('infografis'));
  }
}
