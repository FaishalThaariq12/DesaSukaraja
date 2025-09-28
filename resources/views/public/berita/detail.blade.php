@extends('public.berita.layout')

@section('content')
<div class="container mx-auto px-6 py-12">
  <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <a href="/#berita" class="inline-block mb-6 text-emerald-600 hover:text-emerald-800 transition font-semibold"><i data-lucide="arrow-left"></i> Kembali</a>
    <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://placehold.co/600x400/60a5fa/ffffff?text=Berita' }}" class="w-full max-h-64 object-cover rounded-lg mb-6" alt="{{ $berita->judul }}">
    <span class="text-xs font-semibold text-emerald-600 bg-emerald-100 px-2 py-1 rounded-full">{{ $berita->created_at->format('d M Y') }}</span>
    <h1 class="text-3xl font-bold text-slate-800 mt-2 mb-4 text-center">{{ $berita->judul }}</h1>
    <div class="text-slate-700 leading-relaxed mb-8 text-center">{!! nl2br(e($berita->isi)) !!}</div>
    <div class="flex flex-col md:flex-row md:items-center gap-4 mt-6">
      <span class="font-semibold text-slate-600">Bagikan ke:</span>
      <div class="flex gap-3">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="bg-blue-600 text-white px-3 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-700 transition"><i data-lucide="facebook"></i> Facebook</a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}" target="_blank" class="bg-sky-500 text-white px-3 py-2 rounded-lg flex items-center gap-2 hover:bg-sky-600 transition"><i data-lucide="twitter"></i> Twitter</a>
        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}" target="_blank" class="bg-green-500 text-white px-3 py-2 rounded-lg flex items-center gap-2 hover:bg-green-600 transition"><i data-lucide="whatsapp"></i> WhatsApp</a>
      </div>
    </div>
  </div>
</div>
<script>
  lucide.createIcons();
</script>
@endsection