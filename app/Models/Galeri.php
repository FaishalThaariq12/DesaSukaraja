<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
  protected $fillable = ['judul', 'gambar', 'deskripsi'];

  public function fotos()
  {
    return $this->hasMany(FotoGaleri::class);
  }
}
