<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    // Menampilkan landingpage
    return view('public.beranda');
  }
}
