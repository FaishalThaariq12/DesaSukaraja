<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
  protected $fillable = ['nama', 'slug', 'deskripsi', 'gambar', 'lokasi', 'fasilitas'];
}
