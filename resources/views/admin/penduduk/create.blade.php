@extends('admin.dashboard')
@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md mt-8">
  <h2 class="text-2xl font-bold mb-6 text-slate-800">Tambah Data Penduduk</h2>
  <form action="{{ route('admin.infografis.store') }}" method="POST">
    @csrf
    <div class="mb-4 grid grid-cols-2 gap-4">
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Nama Dusun/Kampung</label>
        <input type="text" name="dusun" class="w-full border border-slate-300 rounded px-3 py-2 focus:outline-emerald-500" required>
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Periode Bulan</label>
        <input type="text" name="bulan" class="w-full border border-slate-300 rounded px-3 py-2" placeholder="cth: Agustus" required>
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Tahun</label>
        <input type="number" name="tahun" class="w-full border border-slate-300 rounded px-3 py-2" value="{{ date('Y') }}" required>
      </div>
    </div>
    <div class="mb-4 grid grid-cols-2 gap-4">
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Total Penduduk</label>
        <input type="number" name="total_penduduk" class="w-full border border-slate-300 rounded px-3 py-2" required>
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Kepala Keluarga</label>
        <input type="number" name="kepala_keluarga" class="w-full border border-slate-300 rounded px-3 py-2" required>
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Laki-laki</label>
        <input type="number" name="laki_laki" class="w-full border border-slate-300 rounded px-3 py-2" required>
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Perempuan</label>
        <input type="number" name="perempuan" class="w-full border border-slate-300 rounded px-3 py-2" required>
      </div>
    </div>
    <div class="mb-4 grid grid-cols-2 gap-4">
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Jumlah KK</label>
        <input type="number" name="jumlah_kk" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Wajib KTP</label>
        <input type="number" name="wajib_ktp" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Sudah KK</label>
        <input type="number" name="sudah_kk" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Belum KK</label>
        <input type="number" name="belum_kk" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Sudah KTP</label>
        <input type="number" name="sudah_ktp" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Belum KTP</label>
        <input type="number" name="belum_ktp" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
    </div>
    <div class="mb-4 grid grid-cols-2 gap-4">
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Lahir</label>
        <input type="number" name="lahir" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Datang</label>
        <input type="number" name="datang" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Mati</label>
        <input type="number" name="mati" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Pindah</label>
        <input type="number" name="pindah" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Penduduk Bulan Lalu</label>
        <input type="number" name="penduduk_bulan_lalu" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Penduduk Bulan Ini</label>
        <input type="number" name="penduduk_bulan_ini" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
    </div>
    <div class="mb-4 grid grid-cols-2 gap-4">
      <div>
        <label class="block mb-1 font-semibold text-slate-700">WNI</label>
        <input type="number" name="wni" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">WNA</label>
        <input type="number" name="wna" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
    </div>
    <div class="mb-6 grid grid-cols-2 gap-4">
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Usia 0-5</label>
        <input type="number" name="kelompok_usia_0_5" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Usia 6-11</label>
        <input type="number" name="kelompok_usia_6_11" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Usia 12-17</label>
        <input type="number" name="kelompok_usia_12_17" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Usia 18-25</label>
        <input type="number" name="kelompok_usia_18_25" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Usia 26-35</label>
        <input type="number" name="kelompok_usia_26_35" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Usia 36-45</label>
        <input type="number" name="kelompok_usia_36_45" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Usia 46-60</label>
        <input type="number" name="kelompok_usia_46_60" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-semibold text-slate-700">Usia 61+</label>
        <input type="number" name="kelompok_usia_61_keatas" class="w-full border border-slate-300 rounded px-3 py-2">
      </div>
    </div>
    <div class="flex justify-end">
      <a href="{{ route('admin.infografis.index') }}" class="bg-slate-200 text-slate-700 px-4 py-2 rounded mr-2">Batal</a>
      <button type="submit" class="bg-emerald-500 text-white px-6 py-2 rounded shadow hover:bg-emerald-600">Simpan</button>
    </div>
  </form>
</div>
@endsection