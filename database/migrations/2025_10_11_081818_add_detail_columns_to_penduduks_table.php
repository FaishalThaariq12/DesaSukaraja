<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penduduks', function (Blueprint $table) {
            $table->string('bulan', 20)->nullable();
            $table->year('tahun')->nullable();
            $table->integer('jumlah_kk')->default(0);
            $table->integer('wajib_ktp')->default(0);
            $table->integer('sudah_kk')->default(0);
            $table->integer('belum_kk')->default(0);
            $table->integer('sudah_ktp')->default(0);
            $table->integer('belum_ktp')->default(0);
            $table->integer('lahir')->default(0);
            $table->integer('datang')->default(0);
            $table->integer('mati')->default(0);
            $table->integer('pindah')->default(0);
            $table->integer('penduduk_bulan_lalu')->default(0);
            $table->integer('penduduk_bulan_ini')->default(0);
            $table->integer('wni')->default(0);
            $table->integer('wna')->default(0);
            $table->integer('kelompok_usia_0_5')->default(0);
            $table->integer('kelompok_usia_6_11')->default(0);
            $table->integer('kelompok_usia_12_17')->default(0);
            $table->integer('kelompok_usia_18_25')->default(0);
            $table->integer('kelompok_usia_26_35')->default(0);
            $table->integer('kelompok_usia_36_45')->default(0);
            $table->integer('kelompok_usia_46_60')->default(0);
            $table->integer('kelompok_usia_61_keatas')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penduduks', function (Blueprint $table) {
            $table->dropColumn([
                'bulan',
                'tahun',
                'jumlah_kk',
                'wajib_ktp',
                'sudah_kk',
                'belum_kk',
                'sudah_ktp',
                'belum_ktp',
                'lahir',
                'datang',
                'mati',
                'pindah',
                'penduduk_bulan_lalu',
                'penduduk_bulan_ini',
                'wni',
                'wna',
                'kelompok_usia_0_5',
                'kelompok_usia_6_11',
                'kelompok_usia_12_17',
                'kelompok_usia_18_25',
                'kelompok_usia_26_35',
                'kelompok_usia_36_45',
                'kelompok_usia_46_60',
                'kelompok_usia_61_keatas',
            ]);
        });
    }
};
