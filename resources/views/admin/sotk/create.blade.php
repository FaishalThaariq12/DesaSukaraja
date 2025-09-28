@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Tambah SOTK</h2>
<form action="{{ route('admin.sotk.store') }}" method="POST">
  @csrf
  <div class="mb-4">
    <label for="nama" class="block">Nama</label>
    <input type="text" name="nama" id="nama" class="border rounded w-full p-2" required>
  </div>
  <div class="mb-4">
    <label for="jabatan" class="block">Jabatan</label>
    <input type="text" name="jabatan" id="jabatan" class="border rounded w-full p-2" required>
  </div>
  <div class="mb-4">
    <label for="foto" class="block">Foto (URL)</label>
    <input type="text" name="foto" id="foto" class="border rounded w-full p-2">
  </div>
  <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection