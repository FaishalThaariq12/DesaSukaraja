@extends('public.layout')

@section('content')
<div class="container mx-auto px-6 py-12">
  <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-3xl font-bold text-slate-800 mb-6 text-center">Visi & Misi Desa Sukaraja</h1>
    <div class="mb-8">
      <h2 class="text-xl font-bold text-emerald-600 mb-2">Visi</h2>
      <div class="text-slate-700 leading-relaxed mb-6">{!! $profil->visi ?? 'Visi desa belum diisi.' !!}</div>
      <h2 class="text-xl font-bold text-emerald-600 mb-2">Misi</h2>
      <div class="text-slate-700 leading-relaxed">{!! $profil->misi ?? 'Misi desa belum diisi.' !!}</div>
    </div>
    <a href="{{ route('profil.sejarah') }}" class="inline-block bg-slate-200 text-slate-700 font-semibold px-5 py-2 rounded-lg shadow hover:bg-slate-300 transition">Kembali ke Sejarah</a>
  </div>
</div>
@endsection