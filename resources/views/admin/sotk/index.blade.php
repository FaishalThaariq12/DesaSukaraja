@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Daftar SOTK</h2>
<a href="{{ route('admin.sotk.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah SOTK</a>
@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif
<table class="min-w-full bg-white">
  <thead>
    <tr>
      <th class="py-2">Nama</th>
      <th class="py-2">Jabatan</th>
      <th class="py-2">Foto</th>
      <th class="py-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sotks as $sotk)
    <tr>
      <td class="py-2">{{ $sotk->nama }}</td>
      <td class="py-2">{{ $sotk->jabatan }}</td>
      <td class="py-2"><img src="{{ $sotk->foto }}" alt="{{ $sotk->nama }}" class="w-16 h-16 object-cover rounded-full"></td>
      <td class="py-2">
        <a href="{{ route('admin.sotk.edit', $sotk->id) }}" class="text-blue-500">Edit</a>
        <form action="{{ route('admin.sotk.destroy', $sotk->id) }}" method="POST" style="display:inline;">
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