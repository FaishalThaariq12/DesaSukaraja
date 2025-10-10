@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Edit Infografis</h2>
<form action="{{ route('admin.infografis.update', $infografis->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-4">
    <label for="judul" class="block">Judul Infografis</label>
    <input type="text" name="judul" id="judul" class="border rounded w-full p-2" value="{{ $infografis->judul }}" required>
  </div>
  <div class="mb-4">
    <label for="slug" class="block">Slug</label>
    <input type="text" name="slug" id="slug" class="border rounded w-full p-2" value="{{ $infografis->slug }}" required>
  </div>
  <div class="mb-4">
    <label for="deskripsi" class="block">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="border rounded w-full p-2" rows="4" required>{{ $infografis->deskripsi }}</textarea>
  </div>
  <div class="mb-4">
    <label for="gambar" class="block">Gambar Infografis</label>
    <input type="file" name="gambar" id="gambar" class="border rounded w-full p-2" accept="image/*">
    @if($infografis->gambar)
    <div class="mt-2 text-xs text-slate-500">Gambar saat ini: <span class="font-mono">{{ $infografis->gambar }}</span></div>
    @endif
  </div>
  <div class="mb-4">
    <label for="kategori" class="block">Kategori</label>
    <input type="text" name="kategori" id="kategori" class="border rounded w-full p-2" value="{{ $infografis->kategori }}">
  </div>
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection