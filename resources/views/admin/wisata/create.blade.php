@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Tambah Wisata</h2>
<form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-4">
    <label for="nama" class="block">Nama Wisata</label>
    <input type="text" name="nama" id="nama" class="border rounded w-full p-2" required>
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
    <label for="gambar" class="block">Gambar Wisata</label>
    <input type="file" name="gambar" id="gambar" class="border rounded w-full p-2" accept="image/*">
  </div>
  <div class="mb-4">
    <label for="lokasi" class="block">Lokasi</label>
    <input type="text" name="lokasi" id="lokasi" class="border rounded w-full p-2">
  </div>
  <div class="mb-4">
    <label for="fasilitas" class="block">Fasilitas</label>
    <textarea name="fasilitas" id="fasilitas" class="border rounded w-full p-2" rows="2"></textarea>
  </div>
  <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection