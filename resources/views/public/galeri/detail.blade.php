{{-- Halaman detail galeri kategori --}}
@extends('public.layout')
@section('content')
<div class="container mx-auto px-4 py-12">
  <div class="mb-8 text-center">
    <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-2">{{ $galeri->judul }}</h1>
    @if($galeri->deskripsi)
    <p class="text-slate-600 text-lg mb-4">{{ $galeri->deskripsi }}</p>
    @endif
  </div>

  @if($galeri->fotos && count($galeri->fotos))
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($galeri->fotos as $foto)
    <div class="relative group rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
      <img src="{{ asset('storage/' . $foto->path) }}" alt="Foto {{ $galeri->judul }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
      <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <span class="text-white font-semibold text-base">{{ $foto->caption }}</span>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <div class="text-center py-16 text-slate-400">
    <i data-lucide="image" class="w-12 h-12 mx-auto mb-4"></i>
    <p>Belum ada foto untuk kategori ini.</p>
  </div>
  @endif
</div>
@endsection