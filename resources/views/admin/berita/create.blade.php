{{-- Form Tambah Berita --}}
@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Tambah Berita</h2>
<form action="{{ route('admin.berita.store') }}" method="POST">
  @csrf
  <div class="mb-4">
    <label for="judul" class="block">Judul</label>
    <input type="text" name="judul" id="judul" class="border rounded w-full p-2" required>
  </div>
  <div class="mb-4">
    <label for="isi" class="block">Isi</label>
    <textarea name="isi" id="isi" class="border rounded w-full p-2" rows="6" required></textarea>
  </div>
  <div class="mb-4">
    <label for="gambar" class="block">Gambar (opsional)</label>
    <input type="text" name="gambar" id="gambar" class="border rounded w-full p-2">
  </div>
  <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection