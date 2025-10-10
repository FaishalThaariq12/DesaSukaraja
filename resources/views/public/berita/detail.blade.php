@extends('public.layout')

@section('content')
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="container mx-auto px-4 md:px-8 py-16">
  <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-6 md:p-10" data-aos="fade-up" data-aos-duration="800">
    <div class="grid md:grid-cols-3 gap-10">
      {{-- Konten Utama --}}
      <div class="md:col-span-2" data-aos="fade-up" data-aos-delay="100">
        <img
          src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://placehold.co/800x450/60a5fa/ffffff?text=Berita' }}"
          class="w-full h-72 object-cover rounded-xl mb-6 shadow-md transition-transform duration-500 hover:scale-[1.02]"
          alt="{{ $berita->judul }}">
        <span class="inline-block text-xs font-semibold text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
          {{ $berita->created_at->format('d F Y') }}
        </span>
        <h1 class="text-3xl font-bold text-slate-800 mt-3 mb-6 leading-tight">{{ $berita->judul }}</h1>

        <div class="berita-isi text-slate-700 mb-10">{!! nl2br(e($berita->isi)) !!}</div>

        <div class="flex flex-col sm:flex-row sm:items-center gap-3 mt-8" data-aos="fade-up" data-aos-delay="200">
          <span class="font-semibold text-slate-700">Bagikan ke:</span>
          <div class="flex flex-wrap gap-3">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
              target="_blank"
              class="bg-blue-600 text-white px-3 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-700 transition">
              <i data-lucide="facebook"></i> Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}"
              target="_blank"
              class="bg-sky-500 text-white px-3 py-2 rounded-lg flex items-center gap-2 hover:bg-sky-600 transition">
              <i data-lucide="twitter"></i> Twitter
            </a>
            <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}"
              target="_blank"
              class="bg-green-500 text-white px-3 py-2 rounded-lg flex items-center gap-2 hover:bg-green-600 transition">
              <i data-lucide="whatsapp"></i> WhatsApp
            </a>
          </div>
        </div>
      </div>

      {{-- Sidebar --}}
      <aside class="md:col-span-1" data-aos="fade-up" data-aos-delay="300">
        <div class="bg-slate-50 rounded-xl shadow-md p-5">
          <h2 class="text-lg font-bold text-emerald-700 mb-5 text-center border-b border-emerald-100 pb-2">
            Berita Terbaru
          </h2>
          <div class="space-y-4">
            @foreach($beritaTerbaru ?? [] as $b)
            <a href="{{ route('berita.detail', $b->slug) }}"
              class="flex items-center gap-3 p-2 rounded-lg hover:bg-emerald-50 transition group"
              data-aos="fade-up" data-aos-delay="{{ 400 + $loop->index * 100 }}">
              <img
                src="{{ $b->gambar ? asset('storage/' . $b->gambar) : 'https://placehold.co/100x80/60a5fa/ffffff?text=Berita' }}"
                alt="{{ $b->judul }}"
                class="w-20 h-16 object-cover rounded-md shadow-sm group-hover:scale-[1.03] transition-transform duration-300">
              <div class="flex-1">
                <div class="font-semibold text-slate-800 text-sm line-clamp-2 group-hover:text-emerald-700 transition">
                  {{ $b->judul }}
                </div>
                <div class="text-xs text-slate-500 mt-1">{{ $b->created_at->format('d M Y') }}</div>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>

<style>
  .berita-isi {
    text-align: justify;
    line-height: 1.8;
    word-break: break-word;
    max-height: 550px;
    overflow-y: auto;
    padding: 1rem;
    border-radius: 0.75rem;
    background: #f8fafc;
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 transparent;
  }

  .berita-isi::-webkit-scrollbar {
    width: 8px;
  }

  .berita-isi::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    border-radius: 9999px;
  }

  @media (max-width: 768px) {
    .berita-isi {
      max-height: 400px;
    }
  }
</style>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    once: true,
    duration: 800
  });
  lucide.createIcons();
</script>
@endsection