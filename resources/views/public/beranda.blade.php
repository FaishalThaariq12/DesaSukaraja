{{-- Blade template untuk beranda Desa Sukaraja --}}
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Resmi Desa Sukaraja, Rawamerta, Karawang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Swiper.js for slider -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8fafc;
      /* slate-50 */
    }

    .hero-bg {
      background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3)), url('https://placehold.co/1920x1080/a0aec0/ffffff?text=Pemandangan+Sawah+Sukaraja');
      background-size: cover;
      background-position: center;
    }

    .fade-in-section {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .fade-in-section.is-visible {
      opacity: 1;
      transform: translateY(0);
    }

    .nav-link {
      position: relative;
      transition: color 0.3s;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -4px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #10b981;
      /* emerald-500 */
      transition: width 0.3s ease-in-out;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .gallery-img:hover .overlay {
      opacity: 1;
    }
  </style>
</head>

<body class="bg-slate-50 text-slate-700">

  <!-- Header & Navigation -->
  <header id="header" class="bg-white/80 backdrop-blur-lg sticky top-0 z-50 shadow-sm transition-all duration-300">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="flex items-center space-x-2">
        <img src="https://placehold.co/40x40/10b981/ffffff?text=DS" alt="Logo Desa Sukaraja"
          class="rounded-full">
        <span class="text-xl font-bold text-slate-800">Desa Sukaraja</span>
      </a>
      <nav class="hidden md:flex items-center space-x-8">
        <a href="#profil" class="nav-link text-slate-600 hover:text-emerald-600 font-medium">Profil</a>
        <a href="#berita" class="nav-link text-slate-600 hover:text-emerald-600 font-medium">Berita</a>
        <a href="#galeri" class="nav-link text-slate-600 hover:text-emerald-600 font-medium">Galeri</a>
        <a href="#peta" class="nav-link text-slate-600 hover:text-emerald-600 font-medium">Peta</a>
        <a href="#sotk" class="nav-link text-slate-600 hover:text-emerald-600 font-medium">SOTK</a>
        <a href="#wisata" class="nav-link text-slate-600 hover:text-emerald-600 font-medium">Wisata</a>
      </nav>
      <div class="flex items-center space-x-4">
        <a href="#pengaduan"
          class="hidden md:inline-block bg-emerald-500 text-white font-semibold px-5 py-2 rounded-lg shadow-md hover:bg-emerald-600 transition-transform duration-300 hover:scale-105">
          Lapor
        </a>
        <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-slate-700 hover:bg-slate-100">
          <i data-lucide="menu"></i>
        </button>
      </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-6 pb-4">
      <a href="#profil" class="block py-2 text-slate-600 hover:text-emerald-600">Profil</a>
      <a href="#berita" class="block py-2 text-slate-600 hover:text-emerald-600">Berita</a>
      <a href="#galeri" class="block py-2 text-slate-600 hover:text-emerald-600">Galeri</a>
      <a href="#peta" class="block py-2 text-slate-600 hover:text-emerald-600">Peta</a>
      <a href="#sotk" class="block py-2 text-slate-600 hover:text-emerald-600">SOTK</a>
      <a href="#wisata" class="block py-2 text-slate-600 hover:text-emerald-600">Wisata</a>
      <a href="#pengaduan"
        class="block w-full text-center mt-4 bg-emerald-500 text-white font-semibold px-5 py-2 rounded-lg shadow-md hover:bg-emerald-600 transition-all">Lapor</a>
    </div>
  </header>

  <main>
    <!-- Hero Section -->
    <section id="beranda" class="hero-bg h-[60vh] md:h-[90vh] flex items-center justify-center text-white">
      <div class="text-center px-4">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 drop-shadow-lg animate-fade-in-down">Selamat Datang
          di Desa Sukaraja</h1>
        <p class="text-lg md:text-2xl mb-8 font-light drop-shadow-md animate-fade-in-up">Kecamatan Rawamerta,
          Kabupaten Karawang</p>
        <a href="#profil"
          class="bg-white text-emerald-600 font-bold py-3 px-8 rounded-full shadow-xl hover:bg-slate-100 transition-transform duration-300 hover:scale-110 transform">
          Jelajahi Desa Kami
        </a>
      </div>
    </section>

    <!-- Profil Desa Section -->
    <section id="profil" class="py-20 bg-white fade-in-section">
      <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div
          class="rounded-lg overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-500">
          <img src="https://placehold.co/600x400/34d399/ffffff?text=Kantor+Desa+Sukaraja"
            alt="Kantor Desa Sukaraja" class="w-full h-full object-cover">
        </div>
        <div>
          <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Profil Desa Sukaraja</h2>
          <p class="mb-4 leading-relaxed">Selamat datang di Desa Sukaraja, sebuah desa yang asri dan penuh
            dengan kearifan lokal. Terletak di Kecamatan Rawamerta, Kabupaten Karawang, desa kami
            berkomitmen untuk terus berkembang menjadi desa yang maju, mandiri, dan sejahtera bagi seluruh
            warganya.</p>
          <p class="mb-6 leading-relaxed">Dengan semangat gotong royong, kami membangun infrastruktur,
            meningkatkan kualitas pendidikan, dan mengoptimalkan potensi sumber daya alam yang ada. Website
            ini hadir sebagai jembatan informasi antara pemerintah desa dengan masyarakat luas.</p>
          <a href="#" class="font-semibold text-emerald-600 hover:text-emerald-700 transition group">
            Baca Sejarah Desa <span
              class="inline-block transition-transform group-hover:translate-x-1 motion-reduce:transform-none">&rarr;</span>
          </a>
        </div>
      </div>
    </section>

    <!-- Berita Desa Section -->
    <section id="berita" class="py-20 fade-in-section">
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Berita & Informasi Desa</h2>
          <p class="text-lg mt-2 text-slate-600">Ikuti perkembangan dan kegiatan terbaru dari Desa Sukaraja.</p>
        </div>
        <div class="relative">
          <div class="swiper berita-swiper pb-12">
            <div class="swiper-wrapper">
              @foreach($beritas as $berita)
              <div class="swiper-slide">
                <div class="bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden flex flex-col h-full group transition-transform duration-300 hover:-translate-y-1">
                  <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://placehold.co/600x400/60a5fa/ffffff?text=Berita' }}" class="w-full max-h-48 h-48 object-cover rounded-t-xl" alt="{{ $berita->judul }}">
                  <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                      <span class="text-xs font-semibold text-emerald-600 bg-emerald-100 px-2 py-1 rounded-full">{{ $berita->created_at->format('d M Y') }}</span>
                      <h3 class="text-lg md:text-xl font-bold my-2 text-slate-800 group-hover:text-emerald-600 transition">{{ $berita->judul }}</h3>
                      <p class="text-slate-600 mb-4 text-sm leading-relaxed">{{ \Illuminate\Support\Str::limit($berita->isi, 100) }}</p>
                    </div>
                    <a href="{{ route('berita.detail', $berita->slug) }}" class="font-semibold text-emerald-500 text-sm hover:text-emerald-700 mt-auto">Baca Selengkapnya &rarr;</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next !bg-white !shadow-lg !rounded-full !w-10 !h-10 !flex !items-center !justify-center !text-emerald-600 !border !border-slate-200"></div>
            <div class="swiper-button-prev !bg-white !shadow-lg !rounded-full !w-10 !h-10 !flex !items-center !justify-center !text-emerald-600 !border !border-slate-200"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Galeri & Wisata Section -->
    <section id="galeri" class="py-20 bg-white fade-in-section">
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Galeri Desa</h2>
          <p class="text-lg mt-2 text-slate-600">Momen dan keindahan yang terekam di Desa Sukaraja.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          @foreach($galeris as $galeri)
          <div class="gallery-img group relative overflow-hidden rounded-lg shadow-md">
            <img src="{{ $galeri->gambar ?? 'https://placehold.co/500x500/818cf8/ffffff?text=Galeri' }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" alt="{{ $galeri->judul }}">
            <img src="{{ $galeri->gambar ? asset('storage/' . $galeri->gambar) : 'https://placehold.co/500x500/818cf8/ffffff?text=Galeri' }}" class="w-full max-h-56 object-cover rounded-lg transform group-hover:scale-110 transition-transform duration-500" alt="{{ $galeri->judul }}">
            <div class="overlay absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              <p class="text-white font-bold text-lg">{{ $galeri->judul }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Wisata Desa Section -->
    <section id="wisata" class="py-20 fade-in-section">
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Potensi Wisata Desa Sukaraja</h2>
          <p class="text-lg mt-2 text-slate-600">Temukan pesona tersembunyi di desa kami.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          @foreach($wisatas as $wisata)
          <div class="bg-white rounded-xl shadow-lg overflow-hidden group">
            <div class="relative">
              <img src="{{ $wisata->gambar ?? 'https://placehold.co/600x400/38bdf8/ffffff?text=Wisata' }}" class="w-full h-56 object-cover" alt="{{ $wisata->nama }}">
              <img src="{{ $wisata->gambar ? asset('storage/' . $wisata->gambar) : 'https://placehold.co/600x400/38bdf8/ffffff?text=Wisata' }}" class="w-full max-h-56 h-56 object-cover rounded-lg" alt="{{ $wisata->nama }}">
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <h3 class="absolute bottom-4 left-4 text-2xl font-bold text-white">{{ $wisata->nama }}</h3>
            </div>
            <div class="p-6">
              <p class="text-slate-600 mb-4">{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 100) }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- SOTK Section -->
    <section id="sotk" class="py-20 bg-white fade-in-section">
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Struktur Organisasi & Tata Kerja</h2>
          <p class="text-lg mt-2 text-slate-600">Pemerintahan Desa Sukaraja Periode 2024-2029</p>
        </div>
        <div class="flex flex-col items-center">
          @foreach($sotks as $sotk)
          <div class="text-center mb-8">
            <img src="{{ $sotk->foto ?? 'https://placehold.co/128x128/94a3b8/ffffff?text=Foto' }}" alt="{{ $sotk->nama }}" class="w-32 h-32 rounded-full mx-auto shadow-lg border-4 border-emerald-400">
            <img src="{{ $sotk->foto ? asset('storage/' . $sotk->foto) : 'https://placehold.co/128x128/94a3b8/ffffff?text=Foto' }}" alt="{{ $sotk->nama }}" class="w-32 h-32 object-cover rounded-full mx-auto shadow-lg border-4 border-emerald-400">
            <h3 class="text-xl font-bold mt-4 text-slate-800">{{ $sotk->nama }}</h3>
            <p class="text-emerald-600 font-semibold">{{ $sotk->jabatan }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Peta Desa & Pengaduan Section -->
    <section class="py-20 fade-in-section">
      <div class="container mx-auto px-6 grid lg:grid-cols-5 gap-12 items-start">
        <!-- Peta Desa -->
        <div id="peta" class="lg:col-span-3">
          <h2 class="text-3xl font-bold text-slate-800 mb-6">Lokasi Desa Kami</h2>
          <div class="rounded-lg overflow-hidden shadow-xl border-4 border-white">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126932.96497277717!2d107.25143397390977!3d-6.175392358824142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977f6b94a1111%3A0x5a219dcf37353f81!2sKarawang%2C%20Kabupaten%20Karawang%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1663742299878!5m2!1sid!2sid"
              width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>

        <!-- Pengaduan -->
        <div id="pengaduan" class="lg:col-span-2 bg-white p-8 rounded-xl shadow-2xl">
          <h2 class="text-3xl font-bold text-slate-800 mb-1">Layanan Pengaduan</h2>
          <p class="text-slate-500 mb-2">Punya keluhan atau masukan? Sampaikan kepada kami.</p>
          <p class="text-slate-600 mb-6">Total pengaduan masuk: <span class="font-bold text-emerald-600">{{ $pengaduanCount }}</span></p>
          <form action="#" method="POST">
            <div class="mb-4">
              <label for="nama" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
              <input type="text" id="nama" name="nama"
                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition"
                placeholder="Masukkan nama Anda">
            </div>
            <div class="mb-4">
              <label for="telepon" class="block text-sm font-medium text-slate-700 mb-1">Nomor
                Telepon</label>
              <input type="tel" id="telepon" name="telepon"
                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition"
                placeholder="0812xxxxxxxx">
            </div>
            <div class="mb-6">
              <label for="pesan" class="block text-sm font-medium text-slate-700 mb-1">Isi
                Pengaduan/Aspirasi</label>
              <textarea id="pesan" name="pesan" rows="4"
                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition"
                placeholder="Tuliskan pesan Anda di sini..."></textarea>
            </div>
            <button type="submit"
              class="w-full bg-emerald-500 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-transform duration-300 hover:scale-105">
              Kirim Pengaduan
            </button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-slate-800 text-white pt-16 pb-8">
    <div class="container mx-auto px-6">
      <div class="grid md:grid-cols-3 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">Desa Sukaraja</h3>
          <p class="text-slate-300">Kecamatan Rawamerta, <br>Kabupaten Karawang, <br>Jawa Barat, Indonesia</p>
        </div>
        <div>
          <h3 class="text-xl font-bold mb-4">Tautan Cepat</h3>
          <ul class="space-y-2">
            <li><a href="#profil" class="text-slate-300 hover:text-emerald-400 transition">Profil Desa</a>
            </li>
            <li><a href="#berita" class="text-slate-300 hover:text-emerald-400 transition">Berita
                Terkini</a></li>
            <li><a href="#pengaduan" class="text-slate-300 hover:text-emerald-400 transition">Layanan
                Pengaduan</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-xl font-bold mb-4">Hubungi Kami</h3>
          <p class="text-slate-300">Email: kontak@sukaraja.desa.id</p>
          <p class="text-slate-300">Telepon: (0267) 123-456</p>
          <div class="flex space-x-4 mt-4">
            <a href="#" class="text-slate-300 hover:text-emerald-400 transition"><i
                data-lucide="facebook"></i></a>
            <a href="#" class="text-slate-300 hover:text-emerald-400 transition"><i
                data-lucide="instagram"></i></a>
            <a href="#" class="text-slate-300 hover:text-emerald-400 transition"><i
                data-lucide="youtube"></i></a>
          </div>
        </div>
      </div>
      <hr class="border-t border-slate-700 my-8">
      <div class="text-center text-slate-400 text-sm">
        &copy; 2025 Pemerintah Desa Sukaraja. All rights reserved.
      </div>
    </div>
  </footer>

  <script>
    // Initialize Lucide Icons
    lucide.createIcons();

    // Swiper slider for berita
    document.addEventListener('DOMContentLoaded', function() {
      new Swiper('.berita-swiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 2
          },
          1024: {
            slidesPerView: 3
          }
        }
      });
    });

    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      const icon = mobileMenuButton.querySelector('i');
      if (mobileMenu.classList.contains('hidden')) {
        icon.setAttribute('data-lucide', 'menu');
      } else {
        icon.setAttribute('data-lucide', 'x');
      }
      lucide.createIcons();
    });

    // Close mobile menu when a link is clicked
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        mobileMenuButton.querySelector('i').setAttribute('data-lucide', 'menu');
        lucide.createIcons();
      });
    });

    // Scroll Animations
    const sections = document.querySelectorAll('.fade-in-section');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
        }
      });
    }, {
      threshold: 0.1
    });

    sections.forEach(section => {
      observer.observe(section);
    });

    // Change header style on scroll
    const header = document.getElementById('header');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('shadow-lg');
      } else {
        header.classList.remove('shadow-lg');
      }
    });
  </script>
</body>

</html>