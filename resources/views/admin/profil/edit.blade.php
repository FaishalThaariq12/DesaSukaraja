@extends('admin.dashboard')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold mb-6 text-slate-800">Edit Profil Desa</h2>
  <form action="{{ route('admin.profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-4">
      <label for="judul" class="block text-sm font-medium text-slate-700 mb-1">Judul Profil</label>
      <input type="text" name="judul" id="judul" value="{{ old('judul', $profil->judul) }}" class="w-full px-4 py-2 border rounded-lg" required>
    </div>
    <div class="mb-4">
      <label for="isi" class="block text-sm font-medium text-slate-700 mb-1">Isi Profil</label>
      <textarea name="isi" id="isi" rows="8" class="w-full px-4 py-2 border rounded-lg" required>{{ old('isi', $profil->isi) }}</textarea>
    </div>
    <div class="mb-4">
      <label for="gambar" class="block text-sm font-medium text-slate-700 mb-1">Gambar Profil</label>
      @if($profil->gambar)
      <img src="{{ asset('storage/' . $profil->gambar) }}" alt="Gambar Profil" class="w-48 mb-2 rounded-lg">
      @endif
      <input type="file" name="gambar" id="gambar" class="w-full px-4 py-2 border rounded-lg">
    </div>
    <div class="mt-6 flex justify-end">
      <button type="submit" class="bg-emerald-500 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-emerald-600 transition">Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection