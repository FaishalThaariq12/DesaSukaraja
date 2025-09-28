{{-- Form Pengaduan Masyarakat --}}
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Pengaduan Masyarakat Desa Sukaraja</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen">
  <form action="{{ route('pengaduan.store') }}" method="POST" class="bg-white p-8 rounded shadow-md w-96">
    @csrf
    <h2 class="text-2xl font-bold mb-6 text-center">Form Pengaduan</h2>
    <div class="mb-4">
      <label for="nama" class="block mb-1">Nama</label>
      <input type="text" name="nama" id="nama" class="border rounded w-full p-2" required>
    </div>
    <div class="mb-4">
      <label for="email" class="block mb-1">Email</label>
      <input type="email" name="email" id="email" class="border rounded w-full p-2" required>
    </div>
    <div class="mb-4">
      <label for="isi" class="block mb-1">Isi Pengaduan</label>
      <textarea name="isi" id="isi" class="border rounded w-full p-2" rows="5" required></textarea>
    </div>
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
    @endif
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full">Kirim</button>
  </form>
</body>

</html>