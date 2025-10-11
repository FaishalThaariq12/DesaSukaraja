@extends('public.layout')

@section('content')
{{-- Styles khusus animasi ringan --}}
<style>
  @keyframes fadeUp {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fade-up {
    animation: fadeUp 600ms cubic-bezier(.22, .9, .35, 1) both;
  }

  @media (prefers-reduced-motion: reduce) {

    .animate-fade-up,
    .countup {
      animation: none !important;
      transition: none !important;
    }
  }

  /* subtle focus ring for keyboard users */
  .focus-ring:focus {
    outline: 3px solid rgba(79, 70, 229, 0.12);
    outline-offset: 2px;
    border-radius: 10px;
  }
</style>

<div class="min-h-screen p-4 sm:p-8 bg-gradient-to-b from-rose-50 via-white to-emerald-50">
  <div class="max-w-6xl mx-auto">

    <!-- HERO / HEADER -->
    <header class="mb-10 md:mb-16 text-center">
      <div class="inline-block px-4 py-2 rounded-full bg-emerald-100 text-emerald-800 text-sm font-medium animate-fade-up">
        Statistik Desa Sukaraja
      </div>
      <h1 class="mt-4 text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-800 leading-tight animate-fade-up">
        Infografis Data Penduduk
      </h1>
      <p class="mt-2 text-gray-600 max-w-2xl mx-auto text-sm sm:text-base animate-fade-up">
        Ringkasan demografi <strong>Desa Sukaraja</strong> — Periode: <strong>Agustus 2023</strong>.
      </p>
    </header>

    <!-- RINGKASAN PER DUSUN -->
    <section class="mb-12">
      <div class="mb-8">
        <a href="{{ url('/#infografis') }}"
          class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-5 py-2 rounded-full shadow transition-all focus-ring">
          <i data-lucide="arrow-left" class="w-4 h-4"></i>
          <span>Kembali ke Beranda</span>
        </a>
      </div>

      <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl md:text-2xl font-semibold text-gray-800">Ringkasan Data Per Dusun</h2>
        <div class="text-sm text-gray-500">Terbaru: Agustus 2023</div>
      </div>


      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($data as $item)
        <article class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm transform transition hover:-translate-y-1 hover:shadow-md focus-ring"
          tabindex="0" aria-labelledby="dusun-{{ $loop->index }}" data-animate>
          <h3 id="dusun-{{ $loop->index }}" class="text-lg font-semibold text-gray-800">
            Dusun {{ $item->dusun }}
          </h3>

          <div class="mt-3 flex items-center justify-between gap-4">
            <div>
              <p class="text-xs text-gray-500">Total Penduduk</p>
              <div class="text-2xl md:text-3xl font-bold text-emerald-700 countup" data-to="{{ $item->total_penduduk }}">0</div>
            </div>

            <div class="text-right">
              <p class="text-xs text-gray-500">Kepala Keluarga</p>
              <div class="text-xl font-semibold text-gray-700">{{ $item->kepala_keluarga }}</div>
            </div>
          </div>

          <div class="mt-4 border-t border-gray-100 pt-3 flex text-sm text-gray-600 justify-between">
            <span>Laki-laki: <strong class="text-gray-800">{{ $item->laki_laki }}</strong></span>
            <span>Perempuan: <strong class="text-gray-800">{{ $item->perempuan }}</strong></span>
          </div>
        </article>
        @endforeach
      </div>
    </section>

    <!-- GRAND TOTAL -->
    <section class="mb-12">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl md:text-2xl font-semibold text-gray-800">Grand Total Desa Sukaraja</h2>
        <p class="text-sm text-gray-500">Ringkasan mutasi & kependudukan</p>
      </div>

      @php
      $total_penduduk = collect($data)->sum(fn($d) => $d ? $d->total_penduduk : 0);
      $total_laki = collect($data)->sum(fn($d) => $d ? $d->laki_laki : 0);
      $total_perempuan = collect($data)->sum(fn($d) => $d ? $d->perempuan : 0);
      $total_kk = collect($data)->sum(fn($d) => $d ? $d->kepala_keluarga : 0);
      $total_wajib_ktp = collect($data)->sum(fn($d) => $d ? $d->wajib_ktp : 0);
      $total_lahir = collect($data)->sum(fn($d) => $d ? $d->lahir : 0);
      $total_datang = collect($data)->sum(fn($d) => $d ? $d->datang : 0);
      $total_mati = collect($data)->sum(fn($d) => $d ? $d->mati : 0);
      $total_pindah = collect($data)->sum(fn($d) => $d ? $d->pindah : 0);
      $persen_laki = $total_penduduk > 0 ? round($total_laki / $total_penduduk * 100, 2) : 0;
      $persen_perempuan = $total_penduduk > 0 ? round($total_perempuan / $total_penduduk * 100, 2) : 0;
      @endphp

      <main class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
        {{-- Card template: ringkas & netral --}}
        @php
        $cards = [
        ['label'=>'TOTAL PENDUDUK','value'=>$total_penduduk,'desc'=>'Jiwa','icon'=>'👨‍👩‍👧‍👦','accent'=>'emerald'],
        ['label'=>'LAKI-LAKI','value'=>$total_laki,'desc'=> $persen_laki.'%','icon'=>'👦','accent'=>'blue'],
        ['label'=>'PEREMPUAN','value'=>$total_perempuan,'desc'=> $persen_perempuan.'%','icon'=>'👧','accent'=>'rose'],
        ['label'=>'JUMLAH KK','value'=>$total_kk,'desc'=>'Kepala Keluarga','icon'=>'🏠','accent'=>'amber'],
        ['label'=>'WAJIB KTP','value'=>$total_wajib_ktp,'desc'=>'Usia 17+','icon'=>'🪪','accent'=>'slate'],
        ['label'=>'LAHIR','value'=>$total_lahir,'desc'=>'Mutasi Bulan Ini','icon'=>'👶','accent'=>'emerald'],
        ['label'=>'DATANG','value'=>$total_datang,'desc'=>'Mutasi Bulan Ini','icon'=>'➡️','accent'=>'teal'],
        ['label'=>'MENINGGAL','value'=>$total_mati,'desc'=>'Mutasi Bulan Ini','icon'=>'🕊️','accent'=>'gray'],
        ['label'=>'PINDAH','value'=>$total_pindah,'desc'=>'Mutasi Bulan Ini','icon'=>'🚚','accent'=>'orange'],
        ];
        @endphp

        @foreach($cards as $c)
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm transform transition hover:scale-[1.01] hover:shadow-md focus-ring" data-animate>
          <div class="flex items-center justify-between">
            <div class="text-sm font-medium text-gray-700">{{ $c['label'] }}</div>
            <div class="text-2xl" aria-hidden="true">{{ $c['icon'] }}</div>
          </div>

          <div class="mt-3 flex items-end justify-between">
            <div class="text-2xl md:text-3xl font-extrabold text-gray-800 countup" data-to="{{ $c['value'] }}">0</div>
            <div class="text-xs text-gray-500">{{ $c['desc'] }}</div>
          </div>
        </div>
        @endforeach
      </main>
    </section>
  </div>
</div>

{{-- SCRIPTS: Intersection observer untuk entrance, dan Count-up sederhana --}}
<script>
  // Respect prefers-reduced-motion
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Entrance animation: add class animate-fade-up when element visible
  (function() {
    if (prefersReduced) return;
    const obs = new IntersectionObserver((entries, o) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('animate-fade-up');
          o.unobserve(e.target);
        }
      });
    }, {
      threshold: 0.12
    });

    document.querySelectorAll('[data-animate]').forEach(el => obs.observe(el));
  })();

  // Simple count-up animation (no dependency)
  (function() {
    const counters = document.querySelectorAll('.countup');
    if (prefersReduced || !counters.length) {
      // if reduced motion, just populate final values
      counters.forEach(el => el.textContent = el.getAttribute('data-to') || el.textContent);
      return;
    }

    function animateCount(el, to) {
      const duration = 1100;
      const start = performance.now();
      const from = 0;
      to = Number(to);

      function tick(now) {
        const t = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - t, 3); // easeOutCubic
        const val = Math.floor(from + (to - from) * eased);
        el.textContent = val.toLocaleString();
        if (t < 1) requestAnimationFrame(tick);
        else el.textContent = to.toLocaleString();
      }
      requestAnimationFrame(tick);
    }

    const obs2 = new IntersectionObserver((entries, o) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          const to = e.target.getAttribute('data-to') || e.target.textContent || 0;
          animateCount(e.target, to);
          o.unobserve(e.target);
        }
      });
    }, {
      threshold: 0.2
    });

    counters.forEach(c => obs2.observe(c));
  })();
</script>
@endsection