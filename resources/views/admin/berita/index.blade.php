{{-- Daftar Berita --}}
@extends('admin.dashboard')
@section('content')
<div class="mb-4">
  <a href="{{ route('admin.berita.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Berita</a>
</div>
@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif
<table class="min-w-full bg-white">
  <thead>
    <tr>
      <th class="py-2">Judul</th>
      <th class="py-2">Slug</th>
      <th class="py-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($beritas as $berita)
    <tr>
      <td class="py-2">{{ $berita->judul }}</td>
      <td class="py-2">{{ $berita->slug }}</td>
      <td class="py-2">
        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-blue-500">Edit</a>
        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
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