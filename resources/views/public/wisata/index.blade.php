{{-- Wisata Desa --}}
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Wisata Desa Sukaraja</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">
  <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Wisata Desa Sukaraja</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @foreach($wisatas as $wisata)
      <div class="bg-white rounded shadow p-4">
        <img src="{{ $wisata->gambar }}" alt="{{ $wisata->nama }}" class="w-full h-48 object-cover mb-2">
        <h2 class="font-semibold">{{ $wisata->nama }}</h2>
        <p>{{ $wisata->deskripsi }}</p>
      </div>
      @endforeach
    </div>
  </div>
</body>

</html>