@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Wisata</h2>
<a href="{{ route('admin.wisata.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Wisata</a>
@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif
<table class="min-w-full bg-white">
  <thead>
    <tr>
      <th class="py-2">Nama</th>
      <th class="py-2">Gambar</th>
      <th class="py-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($wisatas as $wisata)
    <tr>
      <td class="py-2">{{ $wisata->nama }}</td>
      <td class="py-2"><img src="{{ $wisata->gambar }}" alt="{{ $wisata->nama }}" class="w-16 h-16 object-cover"></td>
      <td class="py-2">
        <a href="{{ route('admin.wisata.edit', $wisata->id) }}" class="text-blue-500">Edit</a>
        <form action="{{ route('admin.wisata.destroy', $wisata->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Yakin hapus?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection