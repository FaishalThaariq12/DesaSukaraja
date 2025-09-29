@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Edit Wisata</h2>
<form action="{{ route('admin.wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-4">
    <label for="nama" class="block">Nama Wisata</label>
    <input type="text" name="nama" id="nama" class="border rounded w-full p-2" value="{{ $wisata->nama }}" required>
  </div>
  <div class="mb-4">
    <label for="slug" class="block">Slug</label>
    <input type="text" name="slug" id="slug" class="border rounded w-full p-2" value="{{ $wisata->slug }}" required>
  </div>
  <div class="mb-4">
    <label for="deskripsi" class="block">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="border rounded w-full p-2" rows="4" required>{{ $wisata->deskripsi }}</textarea>
  </div>
  <div class="mb-4">
    <label for="gambar" class="block">Gambar Wisata</label>
    <input type="file" name="gambar" id="gambar" class="border rounded w-full p-2" accept="image/*">
    @if($wisata->gambar)
    <div class="mt-2 text-xs text-slate-500">Gambar saat ini: <span class="font-mono">{{ $wisata->gambar }}</span></div>
    @endif
  </div>
  <div class="mb-4">
    <label for="lokasi" class="block">Lokasi</label>
    <input type="text" name="lokasi" id="lokasi" class="border rounded w-full p-2" value="{{ $wisata->lokasi }}">
  </div>
  <div class="mb-4">
    <label for="fasilitas" class="block">Fasilitas</label>
    <textarea name="fasilitas" id="fasilitas" class="border rounded w-full p-2" rows="2">{{ $wisata->fasilitas }}</textarea>
  </div>
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection