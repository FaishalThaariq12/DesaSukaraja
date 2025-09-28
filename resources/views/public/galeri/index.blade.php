{{-- Galeri Desa --}}
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Galeri Desa Sukaraja</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">
  <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Galeri Desa Sukaraja</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach($galeris as $galeri)
      <div class="bg-white rounded shadow p-4">
        <img src="{{ $galeri->gambar }}" alt="{{ $galeri->judul }}" class="w-full h-48 object-cover mb-2">
        <h2 class="font-semibold">{{ $galeri->judul }}</h2>
        <p>{{ $galeri->deskripsi }}</p>
      </div>
      @endforeach
    </div>
  </div>
</body>

</html>