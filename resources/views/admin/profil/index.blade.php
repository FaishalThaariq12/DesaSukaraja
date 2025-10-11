@extends('admin.dashboard')

@section('content')
<div class="bg-white rounded-lg shadow-md p-8 mb-8">
  <h1 class="text-2xl font-bold text-slate-800 mb-6">Profil Desa</h1>

  @if(isset($profil) && $profil)
  <div class="flex flex-col md:flex-row gap-8 items-start">
    <div class="w-full md:w-1/3 flex-shrink-0">
      @if($profil->gambar)
      <img src="{{ asset('storage/' . $profil->gambar) }}" alt="Gambar Profil Desa" class="w-full h-64 object-cover rounded-lg shadow mx-auto">
      @endif
    </div>

    <div class="flex-1">
      <h2 class="text-xl font-bold text-slate-800 mb-3">{{ $profil->judul }}</h2>
      <div class="text-justify text-slate-700 leading-relaxed border border-slate-200 rounded-lg p-5 bg-slate-50 shadow-inner max-h-96 overflow-y-auto scroll-smooth">
        {!! $profil->isi !!}
      </div>
    </div>
  </div>

  <div class="flex justify-end mt-6">
    <a href="{{ route('admin.profil.edit', $profil->id) }}" class="bg-emerald-500 text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-emerald-600 transition">
      Edit Profil
    </a>
  </div>

  @else
  <div class="text-slate-500 mb-4">Belum ada data profil desa.</div>
  <div class="flex justify-end">
    <a href="{{ route('admin.profil.create') }}" class="bg-emerald-500 text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-emerald-600 transition">
      Tambah Profil
    </a>
  </div>
  @endif
</div>

<style>
  .scroll-smooth::-webkit-scrollbar {
    width: 8px;
  }

  .scroll-smooth::-webkit-scrollbar-thumb {
    background-color: rgba(16, 185, 129, 0.4);
    border-radius: 9999px;
  }

  .scroll-smooth::-webkit-scrollbar-thumb:hover {
    background-color: rgba(16, 185, 129, 0.7);
  }

  .scroll-smooth::-webkit-scrollbar-track {
    background: transparent;
  }
</style>
@endsection