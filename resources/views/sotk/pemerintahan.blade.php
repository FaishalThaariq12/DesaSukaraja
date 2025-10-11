@extends('public.layout')

@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-3xl md:text-4xl font-bold mb-6 text-center">Pemerintahan Desa Sukaraja</h1>
  @php
  $bagan = $sotks->where('jabatan', 'Bagan')->first();
  @endphp
  @if($bagan)
  <div class="flex justify-center mb-10">
    <img src="{{ asset('storage/' . $bagan->foto) }}" alt="Bagan Struktur Organisasi" class="rounded-lg shadow-lg max-w-2xl w-full h-auto">
  </div>
  @endif
  <h2 class="text-xl font-semibold mb-6 text-center">Struktur Organisasi & Tata Kerja</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 justify-items-center">
    @foreach($sotks->where('jabatan', '!=', 'Bagan') as $sotk)
    <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full max-w-xs transform hover:-translate-y-2 transition-transform duration-300">
      <img src="{{ $sotk->foto ? asset('storage/' . $sotk->foto) : 'https://placehold.co/400x400/94a3b8/ffffff?text=Foto' }}" alt="{{ $sotk->nama }}" class="w-full h-auto object-cover">
      <div class="p-4 bg-red-600 text-white text-center">
        <h3 class="text-lg font-bold">{{ $sotk->nama }}</h3>
        <p class="text-sm">{{ $sotk->jabatan }}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection