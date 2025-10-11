@extends('public.layout')

@section('content')
<div class="min-h-screen p-4 sm:p-8 bg-slate-50">
  <div class="max-w-6xl mx-auto">
    <!-- HEADER HALAMAN -->
    <header class="text-center mb-10 md:mb-16">
      <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-2">
        Infografis Data Penduduk
      </h1>
      <p class="text-xl text-gray-500">
        Data Statistik Demografi <strong>Desa Sukaraja</strong>, Bulan <strong>Agustus 2023</strong>
      </p>
      <hr class="mt-4 border-t-2 border-cyan-500 w-24 mx-auto rounded-full">
    </header>

    <!-- DATA PER DUSUN -->
    <section class="mb-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">
        Ringkasan Data Per Dusun
      </h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($data as $item)
        <div class="data-card bg-gradient-to-br from-purple-600 via-cyan-600 to-pink-600 text-white p-6 rounded-2xl shadow-lg border-b-4 border-purple-800">
          <h3 class="text-2xl font-bold mb-2">Dusun {{ $item->dusun }}</h3>
          <div class="flex justify-between items-center border-t border-white/30 pt-3">
            <div>
              <p class="text-xs opacity-80">Total Penduduk (L+P)</p>
              <p class="text-3xl font-bold">{{ $item->total_penduduk }}</p>
            </div>
            <div class="text-right">
              <p class="text-xs opacity-80">Kepala Keluarga</p>
              <p class="text-3xl font-bold">{{ $item->kepala_keluarga }}</p>
            </div>
          </div>
          <div class="flex justify-between text-sm mt-3 pt-2 border-t border-white/30">
            <span>Laki-laki: {{ $item->laki_laki }}</span>
            <span>Perempuan: {{ $item->perempuan }}</span>
          </div>
        </div>
        @endforeach
      </div>
    </section>

    <!-- GRAND TOTAL (10 Kartu Data dengan Ikon Spesifik) -->
    <section class="mb-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">
        Grand Total Desa Sukaraja
      </h2>
      <main class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
        @php
        $total_penduduk = collect($data)->sum(fn($d) => $d ? $d->total_penduduk : 0);
        $total_laki = collect($data)->sum(fn($d) => $d ? $d->laki_laki : 0);
        $total_perempuan = collect($data)->sum(fn($d) => $d ? $d->perempuan : 0);
        $total_kk = collect($data)->sum(fn($d) => $d ? $d->kepala_keluarga : 0);
        $total_wajib_ktp = collect($data)->sum(fn($d) => $d ? $d->wajib_ktp : 0);
        $total_lahir = collect($data)->sum(fn($d) => $d ? $d->lahir : 0);
        $total_datang = collect($data)->sum(fn($d) => $d ? $d->datang : 0);
        $total_mati = collect($data)->sum(fn($d) => $d ? $d->mati : 0);
        $total_pindah = collect($data)->sum(fn($d) => $d ? $d->pindah : 0);
        $persen_laki = $total_penduduk > 0 ? round($total_laki / $total_penduduk * 100, 2) : 0;
        $persen_perempuan = $total_penduduk > 0 ? round($total_perempuan / $total_penduduk * 100, 2) : 0;
        @endphp
        <!-- KARTU 1: TOTAL PENDUDUK -->
        <div class="data-card bg-cyan-600 text-white p-4 rounded-xl shadow-lg border-b-4 border-cyan-800 col-span-2 sm:col-span-1">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">TOTAL PENDUDUK</h2>
            <span class="text-3xl">👨‍👩‍👧‍👦</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_penduduk }}</p>
          <p class="text-xs opacity-80 mt-1">Jiwa (Laki-laki & Perempuan WNI)</p>
        </div>
        <!-- KARTU 2: LAKI-LAKI -->
        <div class="data-card bg-green-600 text-white p-4 rounded-xl shadow-lg border-b-4 border-green-800">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">LAKI-LAKI</h2>
            <span class="text-3xl">👦</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_laki }}</p>
          <p class="text-xs opacity-80 mt-1">Jiwa ({{ $persen_laki }}%)</p>
        </div>
        <!-- KARTU 3: PEREMPUAN -->
        <div class="data-card bg-red-500 text-white p-4 rounded-xl shadow-lg border-b-4 border-red-800">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">PEREMPUAN</h2>
            <span class="text-3xl">👧</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_perempuan }}</p>
          <p class="text-xs opacity-80 mt-1">Jiwa ({{ $persen_perempuan }}%)</p>
        </div>
        <!-- KARTU 4: JUMLAH KK -->
        <div class="data-card bg-yellow-400 text-gray-900 p-4 rounded-xl shadow-lg border-b-4 border-yellow-700">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">JUMLAH KK</h2>
            <span class="text-3xl">🏠</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_kk }}</p>
          <p class="text-xs opacity-80 mt-1">Kepala Keluarga</p>
        </div>
        <!-- KARTU 5: WAJIB KTP -->
        <div class="data-card bg-gray-700 text-white p-4 rounded-xl shadow-lg border-b-4 border-gray-900">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">WAJIB KTP</h2>
            <span class="text-3xl">🪪</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_wajib_ktp }}</p>
          <p class="text-xs opacity-80 mt-1">Jiwa (Usia 17+ atau sudah kawin)</p>
        </div>
        <!-- KARTU 6: LAHIR -->
        <div class="data-card bg-blue-500 text-white p-4 rounded-xl shadow-lg border-b-4 border-blue-600">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">LAHIR</h2>
            <span class="text-3xl">👶</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_lahir }}</p>
          <p class="text-xs opacity-80 mt-1">Jiwa (Mutasi Bulan Berjalan)</p>
        </div>
        <!-- KARTU 7: DATANG -->
        <div class="data-card bg-green-500 text-white p-4 rounded-xl shadow-lg border-b-4 border-green-600">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">DATANG</h2>
            <span class="text-3xl">➡️</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_datang }}</p>
          <p class="text-xs opacity-80 mt-1">Jiwa (Mutasi Bulan Berjalan)</p>
        </div>
        <!-- KARTU 8: MATI -->
        <div class="data-card bg-gray-500 text-white p-4 rounded-xl shadow-lg border-b-4 border-gray-600">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">MATI</h2>
            <span class="text-3xl">💀</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_mati }}</p>
          <p class="text-xs opacity-80 mt-1">Jiwa (Mutasi Bulan Berjalan)</p>
        </div>
        <!-- KARTU 9: PINDAH -->
        <div class="data-card bg-orange-500 text-white p-4 rounded-xl shadow-lg border-b-4 border-orange-700">
          <div class="flex items-center justify-between">
            <h2 class="text-sm font-semibold opacity-90">PINDAH</h2>
            <span class="text-3xl">🚚</span>
          </div>
          <p class="text-3xl font-bold mt-2">{{ $total_pindah }}</p>
          <p class="text-xs opacity-80 mt-1">Jiwa (Mutasi Bulan Berjalan)</p>
        </div>
      </main>
    </section>
  </div>
</div>
@endsection