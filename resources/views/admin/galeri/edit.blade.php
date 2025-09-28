@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Edit Galeri</h2>
<form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-4">
    <label for="judul" class="block">Judul</label>
    <input type="text" name="judul" id="judul" class="border rounded w-full p-2" value="{{ $galeri->judul }}" required>
  </div>
  <div class="mb-4">
    <label for="gambar" class="block">Gambar (URL)</label>
    <input type="text" name="gambar" id="gambar" class="border rounded w-full p-2" value="{{ $galeri->gambar }}" required>
  </div>
  <div class="mb-4">
    <label for="deskripsi" class="block">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="border rounded w-full p-2" rows="4">{{ $galeri->deskripsi }}</textarea>
  </div>
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection