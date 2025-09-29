<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Desa Sukaraja')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8fafc;
    }
  </style>
</head>

<body class="bg-slate-50 text-slate-700">
  <header class="bg-white shadow-sm py-4 mb-8">
    <div class="container mx-auto px-6 flex items-center justify-between">
      <a href="/" class="flex items-center space-x-2">
        <img src="https://placehold.co/40x40/10b981/ffffff?text=DS" alt="Logo Desa Sukaraja" class="rounded-full">
        <span class="text-xl font-bold text-slate-800">Desa Sukaraja</span>
      </a>
      <nav class="flex items-center space-x-6">
        <a href="/" class="text-slate-600 hover:text-emerald-600 font-medium">Beranda</a>
        <a href="/#profil" class="text-slate-600 hover:text-emerald-600 font-medium">Profil</a>
        <a href="/#berita" class="text-slate-600 hover:text-emerald-600 font-medium">Berita</a>
        <a href="/#galeri" class="text-slate-600 hover:text-emerald-600 font-medium">Galeri</a>
        <a href="/#wisata" class="text-slate-600 hover:text-emerald-600 font-medium">Wisata</a>
        <a href="/#sotk" class="text-slate-600 hover:text-emerald-600 font-medium">SOTK</a>
        <a href="/#pengaduan" class="text-slate-600 hover:text-emerald-600 font-medium">Pengaduan</a>
      </nav>
    </div>
  </header>
  @yield('content')
  <footer class="bg-white mt-12 py-6 shadow-inner">
    <div class="container mx-auto px-6 text-center text-slate-500 text-sm">
      &copy; {{ date('Y') }} Desa Sukaraja. All rights reserved.
    </div>
  </footer>
  <script>
    lucide.createIcons();
  </script>
</body>

</html>