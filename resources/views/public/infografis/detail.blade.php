@extends('public.layout')

@section('content')
<div class="container mx-auto px-6 py-12">
  <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
    <img src="{{ $infografis->gambar ? asset('storage/' . $infografis->gambar) : 'https://placehold.co/600x400/38bdf8/ffffff?text=Infografis' }}" class="w-full h-64 object-cover" alt="{{ $infografis->judul ?? '' }}">
    <div class="p-8">
      <h1 class="text-3xl font-bold text-slate-800 mb-4">{{ $infografis->judul ?? '' }}</h1>
      <div class="mb-4 text-slate-600">{!! nl2br(e($infografis->deskripsi ?? '')) !!}</div>
      @if($infografis->kategori)
      <div class="mb-2 text-sm text-slate-500"><i data-lucide="tag" class="w-4 h-4 mr-1 inline"></i> <strong>Kategori:</strong> {{ $infografis->kategori }}</div>
      @endif
      <a href="{{ url()->previous() }}" class="inline-block mt-6 bg-emerald-500 text-white px-4 py-2 rounded shadow hover:bg-emerald-600">Kembali</a>
    </div>
  </div>
</div>
@endsection