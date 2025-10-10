@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Tambah Infografis</h2>
<form action="{{ route('admin.infografis.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-4">
    <label for="judul" class="block">Judul Infografis</label>
    <input type="text" name="judul" id="judul" class="border rounded w-full p-2" required>
  </div>
  <div class="mb-4">
    <label for="slug" class="block">Slug</label>
    <input type="text" name="slug" id="slug" class="border rounded w-full p-2" required>
  </div>
  <div class="mb-4">
    <label for="deskripsi" class="block">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="border rounded w-full p-2" rows="4" required></textarea>
  </div>
  <div class="mb-4">
    <label for="gambar" class="block">Gambar Infografis</label>
    <input type="file" name="gambar" id="gambar" class="border rounded w-full p-2" accept="image/*">
  </div>
  <div class="mb-4">
    <label for="kategori" class="block">Kategori</label>
    <input type="text" name="kategori" id="kategori" class="border rounded w-full p-2">
  </div>
  <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection