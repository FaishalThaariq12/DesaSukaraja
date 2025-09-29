@extends('public.layout')

@section('content')
<div class="container mx-auto px-6 py-12">
  <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <a href="/#profil" class="inline-block mb-6 text-emerald-600 hover:text-emerald-800 transition font-semibold"><i data-lucide="arrow-left"></i> Kembali</a>
    <h1 class="text-3xl font-bold text-slate-800 mb-6 text-center">Sejarah Desa Sukaraja</h1>
    <div class="mb-8 text-slate-700 leading-relaxed">
      {!! $profil->isi ?? 'Sejarah desa belum diisi.' !!}
    </div>
    <div class="mb-8">
      <h2 class="text-xl font-bold text-emerald-600 mb-2">Visi</h2>
      <div class="text-slate-700 leading-relaxed mb-6">{!! $profil->visi ?? 'Visi desa belum diisi.' !!}</div>
      <h2 class="text-xl font-bold text-emerald-600 mb-2">Misi</h2>
      <div class="text-slate-700 leading-relaxed">{!! $profil->misi ?? 'Misi desa belum diisi.' !!}</div>
    </div>
  </div>
</div>
@endsection