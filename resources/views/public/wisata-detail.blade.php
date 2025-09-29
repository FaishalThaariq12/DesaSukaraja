@extends('public.layout')
@section('content')
<div class="container mx-auto px-6 py-12">
  <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
    <img src="{{ $wisata->gambar ? asset('storage/' . $wisata->gambar) : 'https://placehold.co/600x400/38bdf8/ffffff?text=Wisata' }}" class="w-full h-64 object-cover" alt="{{ $wisata->nama }}">
    <div class="p-8">
      <h1 class="text-3xl font-bold text-slate-800 mb-4">{{ $wisata->nama }}</h1>
      <div class="mb-4 text-slate-600">{!! nl2br(e($wisata->deskripsi)) !!}</div>
      @if($wisata->lokasi)
      <div class="mb-2 text-sm text-slate-500"><i data-lucide="map-pin" class="w-4 h-4 mr-1 inline"></i> <strong>Lokasi:</strong> {{ $wisata->lokasi }}</div>
      @endif
      @if($wisata->fasilitas)
      <div class="mb-2 text-sm text-slate-500"><i data-lucide="list" class="w-4 h-4 mr-1 inline"></i> <strong>Fasilitas:</strong> {{ $wisata->fasilitas }}</div>
      @endif
      <a href="{{ url()->previous() }}" class="inline-block mt-6 bg-emerald-500 text-white px-4 py-2 rounded shadow hover:bg-emerald-600">Kembali</a>
    </div>
  </div>
</div>
@endsection