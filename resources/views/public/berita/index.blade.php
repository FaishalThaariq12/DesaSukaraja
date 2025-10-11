@extends('public.layout')

@section('content')
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="container mx-auto px-4 md:px-8 py-16">
  <div class="max-w-4xl mx-auto text-center mb-6" data-aos="fade-up" data-aos-delay="100">
    <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-3 md:mb-4">
      Semua Berita Desa Sukaraja
    </h1>
    <p class="text-slate-600 text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
      Menyajikan informasi terbaru tentang peristiwa, berita terkini, dan artikel-artikel jurnalistik dari Desa Sukaraja.
    </p>
  </div>

  <div class="flex justify-center mb-12" data-aos="fade-up" data-aos-delay="150">
    <a href="{{ url('/') }}"
      class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-medium px-5 py-2.5 md:px-7 md:py-3 rounded-full shadow-md hover:shadow-lg transition-all duration-300">
      <i data-lucide="arrow-left" class="w-4 h-4 md:w-5 md:h-5"></i>
      <span>Kembali ke Beranda</span>
    </a>
  </div>





  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
    @forelse($beritas as $index => $berita)
    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition duration-500 group"
      data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
      <a href="{{ route('berita.detail', $berita->slug) }}">
        <img
          src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://placehold.co/600x400/60a5fa/ffffff?text=Berita' }}"
          alt="{{ $berita->judul }}"
          class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
      </a>
      <div class="p-6 text-left">
        <span class="text-sm text-slate-500">{{ $berita->created_at->format('d F Y') }}</span>
        <h3 class="text-xl font-semibold mt-2 mb-3 text-slate-800 group-hover:text-emerald-600 transition">
          {{ $berita->judul }}
        </h3>
        <p class="text-slate-600 text-sm leading-relaxed mb-4">
          {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 120) }}
        </p>
        <a href="{{ route('berita.detail', $berita->slug) }}"
          class="inline-block text-emerald-600 font-medium text-sm hover:text-emerald-700 transition">
          Baca Selengkapnya →
        </a>
      </div>
    </div>
    @empty
    <div class="col-span-3 text-center text-slate-500 py-16" data-aos="fade-up">
      Belum ada berita yang tersedia.
    </div>
    @endforelse
  </div>

  <div class="flex justify-center mt-14" data-aos="fade-up" data-aos-delay="500">
    {{ $beritas->links('vendor.pagination.tailwind') }}
  </div>
</div>

<!-- Custom Pagination Style -->
<style>
  .pagination {
    @apply flex items-center justify-center gap-2;
  }

  .pagination .page-item a,
  .pagination .page-item span {
    @apply px-4 py-2 rounded-lg text-sm font-medium transition;
  }

  .pagination .page-item a {
    @apply text-slate-600 hover:bg-emerald-100 hover:text-emerald-700;
  }

  .pagination .page-item.active span {
    @apply bg-emerald-500 text-white shadow-md;
  }

  .pagination .page-item.disabled span {
    @apply text-slate-400;
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