@extends('public.layout')

@section('content')
<div class="container mx-auto px-2 md:px-8 py-12">
  <div class="max-w-5xl mx-auto space-y-8">

    <div class="bg-white rounded-xl shadow-lg p-8 border-2 border-emerald-100 transform transition duration-700 ease-out hover:-translate-y-1 hover:shadow-xl opacity-0 animate-fadeInUp">
      <h1 class="text-3xl font-bold text-slate-800 mb-4 text-center">Sejarah Desa Sukaraja</h1>
      <div class="text-slate-700 leading-relaxed profil-content">{!! $profil->isi ?? 'Sejarah desa belum diisi.' !!}</div>
    </div>

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
    padding: 0.5rem 1rem;
    background: #f8fafc;
    border-radius: 0.5rem;
    margin-bottom: 0.5rem;
    word-break: break-word;
    text-align: justify;
    line-height: 1.8;
    font-size: 1.05rem;
  }

  @media (max-width: 768px) {
    .profil-content {
      max-height: 200px;
      font-size: 0.98rem;
    }
  }
</style>
@endsection