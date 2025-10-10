@extends('admin.dashboard')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg animate-fadeIn">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-2xl font-bold text-slate-800">Tambah Galeri</h2>
    <a href="{{ route('admin.galeri.index') }}"
      class="text-sm text-slate-600 hover:text-emerald-500 flex items-center gap-1 bg-white border border-slate-300 px-4 py-2 rounded-lg shadow hover:bg-slate-100 transition-colors">
      <i data-lucide="arrow-left" class="w-4 h-4"></i> <span>Kembali</span>
    </a>
  </div>

  <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <div>
      <label for="judul" class="block text-sm font-medium text-slate-700 mb-1">Judul Galeri</label>
      <input type="text" name="judul" id="judul"
        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
        placeholder="Masukkan judul galeri" required>
    </div>

    <div>
      <label for="gambar" class="block text-sm font-medium text-slate-700 mb-1">Upload Gambar</label>
      <input type="file" name="gambar" id="gambar"
        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200">
    </div>

    <div>
      <label for="deskripsi" class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
      <textarea name="deskripsi" id="deskripsi" rows="4"
        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
        placeholder="Tulis deskripsi singkat tentang foto ini..."></textarea>
    </div>


    <div class="mt-8 border-t pt-6 flex justify-end">
      <button type="submit"
        class="bg-emerald-600 text-white font-semibold px-6 py-2.5 rounded-lg shadow-md hover:bg-emerald-700 transform hover:scale-105 transition-all duration-300">
        Simpan Galeri
      </button>
    </div>
  </form>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
  });
</script>

<style>
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fadeIn {
    animation: fadeIn 0.5s ease-out forwards;
  }
</style>
@endsection