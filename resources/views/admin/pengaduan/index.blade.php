@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Pengaduan</h2>
@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif
<table class="min-w-full bg-white">
  <thead>
    <tr>
      <th class="py-2">Nama</th>
      <th class="py-2">Email</th>
      <th class="py-2">Isi</th>
      <th class="py-2">Status</th>
      <th class="py-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pengaduans as $pengaduan)
    <tr>
      <td class="py-2">{{ $pengaduan->nama }}</td>
      <td class="py-2">{{ $pengaduan->email }}</td>
      <td class="py-2">{{ $pengaduan->isi }}</td>
      <td class="py-2">{{ $pengaduan->status }}</td>
      <td class="py-2">
        <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}" method="POST" style="display:inline;">
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