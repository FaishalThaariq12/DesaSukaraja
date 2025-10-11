@extends('public.layout')

@section('content')
<div class="container mx-auto px-3 md:px-8 py-14">
  <div class="max-w-5xl mx-auto space-y-10">

    <!-- Tombol Kembali -->
    <div class="flex justify-center" data-aos="fade-down" data-aos-duration="700">
      <a href="{{ url('/') }}#profil"
        class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-teal-500
               hover:from-emerald-600 hover:to-teal-600 text-white font-medium
               px-5 py-2.5 md:px-7 md:py-3 rounded-full shadow-md hover:shadow-lg
               transition-all duration-300 transform hover:-translate-y-0.5 hover:scale-[1.03]
               active:scale-[0.97] group">
        <i data-lucide="arrow-left" class="w-4 h-4 md:w-5 md:h-5 transition-transform duration-300 group-hover:-translate-x-1"></i>
        <span>Kembali ke Profil</span>
      </a>
    </div>

    <!-- Sejarah -->
    <div class="bg-white rounded-xl shadow-lg p-8 border-2 border-emerald-100 transform transition duration-700 ease-out hover:-translate-y-1 hover:shadow-xl opacity-0 animate-fadeInUp">
      <h1 class="text-3xl font-bold text-slate-800 mb-4 text-center">Sejarah Desa Sukaraja</h1>
      <div class="text-slate-700 leading-relaxed profil-content">{!! $profil->isi ?? 'Sejarah desa belum diisi.' !!}</div>
    </div>

    <!-- Visi & Misi -->
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white rounded-xl shadow-lg p-8 border-2 border-emerald-100 flex flex-col justify-center transform transition duration-700 ease-out hover:-translate-y-1 hover:shadow-xl opacity-0 animate-fadeInUp delay-200 h-full">
        <h2 class="text-3xl font-bold text-emerald-600 mb-4 text-center">Visi</h2>
        <div class="text-slate-700 leading-relaxed text-center profil-content">{!! $profil->visi ?? 'Visi desa belum diisi.' !!}</div>
      </div>

      <div class="bg-white rounded-xl shadow-lg p-8 border-2 border-emerald-100 flex flex-col justify-center transform transition duration-700 ease-out hover:-translate-y-1 hover:shadow-xl opacity-0 animate-fadeInUp delay-400 h-full">
        <h2 class="text-3xl font-bold text-emerald-600 mb-4 text-center">Misi</h2>
        <div class="text-slate-700 leading-relaxed text-center profil-content">{!! $profil->misi ?? 'Misi desa belum diisi.' !!}</div>
      </div>
    </div>

  </div>
</div>

<!-- Style -->
<style>
  @keyframes fadeInUp {
    0% {
      opacity: 0;
      transform: translateY(20px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fadeInUp {
    animation: fadeInUp 0.8s ease-out forwards;
  }

  .animate-fadeInUp.delay-200 {
    animation-delay: 0.2s;
  }

  .animate-fadeInUp.delay-400 {
    animation-delay: 0.4s;
  }

  .profil-content {
    max-height: 350px;
    overflow-y: auto;
    padding: 1rem 1.25rem;
    background: #f8fafc;
    border-radius: 0.75rem;
    margin-bottom: 0.5rem;
    word-break: break-word;
    text-align: justify;
    line-height: 1.8;
    font-size: 1.05rem;
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 transparent;
  }

  .profil-content::-webkit-scrollbar {
    width: 8px;
  }

  .profil-content::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    border-radius: 9999px;
  }

  @media (max-width: 768px) {
    .profil-content {
      max-height: 220px;
      font-size: 0.98rem;
    }
  }
</style>

<!-- AOS (animasi scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    once: true,
    duration: 800
  });
  lucide.createIcons();
</script>
@endsection