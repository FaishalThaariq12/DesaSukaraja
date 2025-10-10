@extends('admin.dashboard')
@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg animate-fadeIn">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-2xl font-bold text-slate-800">Detail Galeri: {{ $galeri->judul }}</h2>
    <div class="flex gap-2">
      <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="text-sm text-slate-600 hover:text-emerald-500 flex items-center gap-1 bg-white border border-slate-300 px-4 py-2 rounded-lg shadow hover:bg-slate-100 transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> <span>Kembali</span>
      </a>
      <a href="{{ route('admin.galeri.foto.create', $galeri->id) }}" class="text-sm bg-emerald-500 text-white px-4 py-2 rounded-lg shadow hover:bg-emerald-600 flex items-center gap-1 transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i> <span>Tambah Foto</span>
      </a>
    </div>
  </div>
  @if(session('success'))
  <div class="mb-4 p-3 bg-emerald-50 text-emerald-700 rounded">{{ session('success') }}</div>
  @endif
  <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @forelse($galeri->fotos as $foto)
    <div class="relative group rounded-xl overflow-hidden shadow-md">
      <img src="{{ asset('storage/' . $foto->path) }}" alt="Foto" class="w-full h-40 object-cover">
      <div class="absolute top-2 right-2 flex gap-2">
        <a href="{{ route('admin.galeri.foto.edit', $foto->id) }}" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600"><i data-lucide="edit" class="w-4 h-4"></i></a>
        <form action="{{ route('admin.galeri.foto.destroy', $foto->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
          @csrf @method('DELETE')
          <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600"><i data-lucide="trash" class="w-4 h-4"></i></button>
        </form>
      </div>
      <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white text-center py-1">{{ $foto->caption }}</div>
    </div>
    @empty
    <div class="col-span-4 text-center text-slate-400 py-12">
      <i data-lucide="image" class="w-12 h-12 mx-auto mb-4"></i>
      <p>Belum ada foto detail untuk galeri ini.</p>
    </div>
    @endforelse
  </div>
</div>
@endsection