@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Edit SOTK</h2>
<form action="{{ route('admin.sotk.update', $sotk->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-4">
    <label for="nama" class="block">Nama</label>
    <input type="text" name="nama" id="nama" class="border rounded w-full p-2" value="{{ $sotk->nama }}" required>
  </div>
  <div class="mb-4">
    <label for="jabatan" class="block">Jabatan</label>
    <input type="text" name="jabatan" id="jabatan" class="border rounded w-full p-2" value="{{ $sotk->jabatan }}" required>
  </div>
  <div class="mb-4">
    <label for="foto" class="block">Foto (gambar)</label>
    <input type="file" name="foto" id="foto" class="border rounded w-full p-2" accept="image/*">
    @if($sotk->foto)
    <div class="mt-2">
      <img src="{{ asset('storage/' . $sotk->foto) }}" alt="Foto" class="w-32 h-32 object-cover rounded shadow">
    </div>
    @endif
  </div>
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection