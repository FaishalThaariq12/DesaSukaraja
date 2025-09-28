@php
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Wisata;
use App\Models\Sotk;
use App\Models\Pengaduan;
use App\Models\User;
$totalPenduduk = User::count();
$totalBerita = Berita::count();
$totalPengaduan = Pengaduan::count();
$totalWisata = Wisata::count();
$pengaduanTerbaru = Pengaduan::orderBy('created_at', 'desc')->take(3)->get();
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dasbor Admin - Desa Sukaraja</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="icon" href="https://placehold.co/32x32/10b981/ffffff?text=DS" type="image/x-icon">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f1f5f9;
    }

    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }

    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
  </style>
</head>

<body class="antialiased text-slate-600">
  <div class="flex h-screen bg-slate-100">
    <!-- Sidebar -->
    <!-- [FIX 1] Added classes for mobile overlay behavior -->
    <aside id="sidebar"
      class="w-64 bg-white shadow-lg flex flex-col fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out z-30">
      <div class="flex items-center justify-center h-20 border-b">
        <a href="#" class="flex items-center space-x-2">
          <img src="https://placehold.co/40x40/10b981/ffffff?text=DS" alt="Logo Desa Sukaraja"
            class="rounded-full">
          <span class="text-xl font-bold text-slate-800">Admin Sukaraja</span>
        </a>
      </div>
      <nav class="flex-1 px-4 py-6 space-y-2">
        <a href="{{ route('admin.dashboard') }}"
          class="flex items-center px-4 py-2 text-white bg-emerald-500 rounded-lg"><i
            data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>Dashboard</a>
        <a href="{{ route('admin.berita.index') }}"
          class="flex items-center px-4 py-2 text-slate-700 hover:bg-slate-200 rounded-lg transition-colors"><i
            data-lucide="newspaper" class="w-5 h-5 mr-3"></i>Berita</a>
        <a href="{{ route('admin.galeri.index') }}"
          class="flex items-center px-4 py-2 text-slate-700 hover:bg-slate-200 rounded-lg transition-colors"><i
            data-lucide="image" class="w-5 h-5 mr-3"></i>Galeri</a>
        <a href="{{ route('admin.wisata.index') }}"
          class="flex items-center px-4 py-2 text-slate-700 hover:bg-slate-200 rounded-lg transition-colors"><i
            data-lucide="map" class="w-5 h-5 mr-3"></i>Wisata</a>
        <a href="{{ route('admin.sotk.index') }}"
          class="flex items-center px-4 py-2 text-slate-700 hover:bg-slate-200 rounded-lg transition-colors"><i
            data-lucide="users" class="w-5 h-5 mr-3"></i>SOTK</a>
        <a href="{{ route('admin.pengaduan.index') }}"
          class="flex items-center px-4 py-2 text-slate-700 hover:bg-slate-200 rounded-lg transition-colors"><i
            data-lucide="message-square" class="w-5 h-5 mr-3"></i>Pengaduan</a>
      </nav>
      <div class="px-4 py-4 border-t">
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit"
            class="flex w-full items-center px-4 py-2 text-slate-700 hover:bg-red-100 hover:text-red-600 rounded-lg transition-colors">
            <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>Keluar
          </button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Header -->
      <header class="bg-white shadow-md z-20">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
          <button id="mobile-menu-btn" class="md:hidden text-slate-700"><i data-lucide="menu"
              class="w-6 h-6"></i></button>
          <h1 class="text-xl font-semibold text-slate-800 hidden md:block">Selamat Datang, Admin!</h1>
          <div class="flex items-center space-x-4">
            <div class="relative hidden md:block">
              <i data-lucide="search"
                class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
              <input type="text" placeholder="Cari..."
                class="pl-10 pr-4 py-2 w-full border border-slate-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition">
            </div>
            <button class="relative text-slate-600 hover:text-emerald-500">
              <i data-lucide="bell" class="w-6 h-6"></i>
              <span
                class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
            </button>
            <div class="relative">
              <button class="flex items-center space-x-2">
                <img src="https://placehold.co/40x40/94a3b8/ffffff?text=A" alt="Avatar Admin"
                  class="w-10 h-10 rounded-full object-cover">
                <span class="hidden lg:block font-semibold">Admin Desa</span>
                <i data-lucide="chevron-down" class="w-4 h-4 hidden lg:block"></i>
              </button>
            </div>
          </div>
        </div>
      </header>
      <!-- Content -->
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-100 p-6">
        <div class="container mx-auto">
          <!-- Stats Cards -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-slate-500">Total Penduduk</p>
                <p class="text-3xl font-bold text-slate-800">{{ number_format($totalPenduduk) }}</p>
              </div>
              <div class="bg-emerald-100 text-emerald-600 p-3 rounded-full">
                <i data-lucide="users" class="w-6 h-6"></i>
              </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-slate-500">Artikel Berita</p>
                <p class="text-3xl font-bold text-slate-800">{{ number_format($totalBerita) }}</p>
              </div>
              <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                <i data-lucide="newspaper" class="w-6 h-6"></i>
              </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-slate-500">Pengaduan Masuk</p>
                <p class="text-3xl font-bold text-slate-800">{{ number_format($totalPengaduan) }}</p>
              </div>
              <div class="bg-amber-100 text-amber-600 p-3 rounded-full">
                <i data-lucide="message-square" class="w-6 h-6"></i>
              </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-slate-500">Wisata Desa</p>
                <p class="text-3xl font-bold text-slate-800">{{ number_format($totalWisata) }}</p>
              </div>
              <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                <i data-lucide="map" class="w-6 h-6"></i>
              </div>
            </div>
          </div>
          <!-- Recent Activities Table -->
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-semibold text-slate-800 mb-4">Pengaduan Terbaru</h3>
            <div class="overflow-x-auto">
              <table class="w-full text-left">
                <thead>
                  <tr class="border-b bg-slate-50">
                    <th class="p-4 font-semibold">Pelapor</th>
                    <th class="p-4 font-semibold">Isi</th>
                    <th class="p-4 font-semibold">Tanggal</th>
                    <th class="p-4 font-semibold">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($pengaduanTerbaru as $pengaduan)
                  <tr class="border-b hover:bg-slate-50">
                    <td class="p-4">{{ $pengaduan->nama }}</td>
                    <td class="p-4 max-w-sm truncate">{{ $pengaduan->isi }}</td>
                    <td class="p-4">{{ $pengaduan->created_at->format('d M Y') }}</td>
                    <td class="p-4">
                      @if($pengaduan->status == 'Baru')
                      <span
                        class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">Baru</span>
                      @elseif($pengaduan->status == 'Diproses')
                      <span
                        class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">Diproses</span>
                      @else
                      <span
                        class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Selesai</span>
                      @endif
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4" class="text-center p-4 text-slate-500">
                      Belum ada pengaduan.
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
    <!-- [FIX 2] Overlay moved here, outside main content -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden md:hidden"></div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      lucide.createIcons();
      const sidebar = document.getElementById('sidebar');
      const mobileMenuBtn = document.getElementById('mobile-menu-btn');
      const sidebarOverlay = document.getElementById('sidebar-overlay');

      function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        sidebarOverlay.classList.toggle('hidden');
      }
      mobileMenuBtn.addEventListener('click', toggleSidebar);
      sidebarOverlay.addEventListener('click', toggleSidebar);
    });
  </script>
</body>

</html>