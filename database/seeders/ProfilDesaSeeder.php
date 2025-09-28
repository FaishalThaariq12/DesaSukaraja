<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilDesaSeeder extends Seeder
{
  public function run()
  {
    DB::table('profil_desas')->insert([
      'judul' => 'Profil Desa Sukaraja',
      'isi' => 'Selamat datang di Desa Sukaraja, sebuah desa yang asri dan penuh dengan kearifan lokal...',
      'gambar' => null,
    ]);
  }
}
