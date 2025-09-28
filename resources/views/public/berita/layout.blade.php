<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Website Resmi Desa Sukaraja')</title>

  <!-- Tailwind CSS v3 -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    
    .nav-link-active {
      color: #10b981;
            font-weight: 600;
    }

    .nav-link-active::after {
      width: 100%;
    }
  </style>

  {{-- Slot untuk CSS tambahan per halaman --}}
  @stack('styles')
</head>

<body class="bg-slate-50 text-slate-800">

  <!-- Header & Navigation -->
  <header id="header" class="bg-white/90 backdrop-blur-lg sticky top-0 z-50 shadow-md transition-all duration-300">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <a href="/" class="flex items-center space-x-3">
        <img src="https://placehold.co/40x40/10b981/ffffff?text=DS" alt="Logo Desa Sukaraja" class="rounded-full shadow-sm">
        <span class="text-xl font-bold text-slate-800">Desa Sukaraja</span>
      </a>
   </div>

   
  <!-- Konten Utama -->
  <main class="container mx-auto px-6 py-10">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-slate-800 text-white pt-16 pb-8">
    <div class="container mx-auto px-6">
      <div class="grid md:grid-cols-3 gap-10">
        {{-- Kolom Info Desa --}}
        <div class="md:col-span-1">
          <h3 class="text-xl font-bold mb-4">Desa Sukaraja</h3>
          <p class="text-slate-300 leading-relaxed">
            Kecamatan Rawamerta, <br>
            Kabupaten Karawang, <br>
            Jawa Barat, Indonesia
          </p>
        </div>

        {{-- Kolom Tautan Cepat --}}
        <div>
          <h3 class="text-xl font-bold mb-4">Tautan Cepat</h3>
          <ul class="space-y-3">
            <li><a href="/#profil" class="text-slate-300 hover:text-emerald-400 transition">Profil Desa</a></li>
            <li><a href="/#berita" class="text-slate-300 hover:text-emerald-400 transition">Berita Terkini</a></li>
            <li><a href="/#galeri" class="text-slate-300 hover:text-emerald-400 transition">Galeri</a></li>
            <li><a href="/#pengaduan" class="text-slate-300 hover:text-emerald-400 transition">Layanan Pengaduan</a></li>
          </ul>
        </div>

        {{-- Kolom Kontak & Media Sosial --}}
        <div>
          <h3 class="text-xl font-bold mb-4">Hubungi Kami</h3>
          <ul class="space-y-3 text-slate-300">
            <li class="flex items-center"><i data-lucide="mail" class="w-5 h-5 mr-3 text-emerald-400"></i>kontak@sukaraja.desa.id</li>
            <li class="flex items-center"><i data-lucide="phone" class="w-5 h-5 mr-3 text-emerald-400"></i>(0267) 123-456</li>
          </ul>
          <div class="flex space-x-4 mt-6">
            <a href="#" class="text-slate-300 hover:text-emerald-400 transition transform hover:scale-110"><i data-lucide="facebook"></i></a>
            <a href="#" class="text-slate-300 hover:text-emerald-400 transition transform hover:scale-110"><i data-lucide="instagram"></i></a>
            <a href="#" class="text-slate-300 hover:text-emerald-400 transition transform hover:scale-110"><i data-lucide="youtube"></i></a>
          </div>
        </div>
      </div>

      <hr class="border-t border-slate-700 my-8">

      <div class="text-center text-slate-400 text-sm">
        &copy; {{ date('Y') }} Pemerintah Desa Sukaraja. All rights reserved.
      </div>
    </div>
  </footer>

  {{-- Inisialisasi Ikon & Skrip Tambahan --}}
  <script>
    // Inisialisasi Lucide Icons
    lucide.createIcons();

    // Logika untuk Menu Mobile
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuButton) {
      mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        const icon = mobileMenuButton.querySelector('i');
        const isHidden = mobileMenu.classList.contains('hidden');
        icon.setAttribute('data-lucide', isHidden ? 'menu' : 'x');
        lucide.createIcons(); // Render ulang ikon setelah diubah
      });
    }
  </script>

  @stack('scripts')
</body>

</html>