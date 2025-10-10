<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('foto_galeris', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('galeri_id');
      $table->string('path');
      $table->string('caption')->nullable();
      $table->timestamps();
      $table->foreign('galeri_id')->references('id')->on('galeris')->onDelete('cascade');
    });
  }
  public function down(): void
  {
    Schema::dropIfExists('foto_galeris');
  }
};
