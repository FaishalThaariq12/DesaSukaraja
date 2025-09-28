{{-- SOTK Desa --}}
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Struktur Organisasi Desa Sukaraja</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">
  <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Struktur Organisasi Desa Sukaraja</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach($sotks as $sotk)
      <div class="bg-white rounded shadow p-4 text-center">
        <img src="{{ $sotk->foto }}" alt="{{ $sotk->nama }}" class="w-24 h-24 object-cover rounded-full mx-auto mb-2">
        <h2 class="font-semibold">{{ $sotk->nama }}</h2>
        <p class="text-sm text-gray-600">{{ $sotk->jabatan }}</p>
      </div>
      @endforeach
    </div>
  </div>
</body>

</html>