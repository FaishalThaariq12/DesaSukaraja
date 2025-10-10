@extends('admin.dashboard')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg animate-fadeIn">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-2xl font-bold text-slate-800">Edit Galeri</h2>
    <div class="flex gap-2">
      <a href="{{ route('admin.galeri.index') }}"
        class="text-sm text-slate-600 hover:text-emerald-500 flex items-center gap-1 bg-white border border-slate-300 px-4 py-2 rounded-lg shadow hover:bg-slate-100 transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> <span>Kembali</span>
      </a>
      <a href="{{ route('admin.galeri.foto.index', $galeri->id) }}"
        class="text-sm bg-emerald-500 text-white px-4 py-2 rounded-lg shadow hover:bg-emerald-600 flex items-center gap-1 transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        <span>Tambah Detail Galeri</span>
      </a>
    </div>
  </div>

  <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
      <label for="judul" class="block text-sm font-medium text-slate-700 mb-1">Judul Galeri</label>
      <input type="text" name="judul" id="judul"
        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
        value="{{ $galeri->judul }}" required>
    </div>

    <div>
      <label for="gambar" class="block text-sm font-medium text-slate-700 mb-1">Upload Gambar</label>
      <input type="file" name="gambar" id="gambar"
        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
        accept="image/*"
        onchange="previewImage(event)">

      @if($galeri->gambar)
      <div class="mt-4">
        <span class="text-xs text-slate-500">Gambar saat ini:</span>
        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Gambar Galeri"
          class="h-32 rounded-lg shadow-md mt-2 border border-slate-200" id="currentImage">
      </div>
      @endif

      <div id="previewContainer" class="hidden mt-4">
        <span class="text-xs text-slate-500">Pratinjau gambar baru:</span>
        <img id="previewImage" class="h-32 rounded-lg shadow-md mt-2 border border-slate-200 object-cover">
      </div>
    </div>


    <div>
      <label for="deskripsi" class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
      <textarea name="deskripsi" id="deskripsi" rows="4"
        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
        placeholder="Tuliskan deskripsi singkat...">{{ $galeri->deskripsi }}</textarea>
    </div>

    <div class="mt-8 border-t pt-6 flex justify-end">
      <button type="submit"
        class="bg-blue-600 text-white font-semibold px-6 py-2.5 rounded-lg shadow-md hover:bg-blue-700 transform hover:scale-105 transition-all duration-300">
        Update Galeri
      </button>
    </div>
  </form>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
  });

  function previewImage(event) {
    const preview = document.getElementById('previewImage');
    const container = document.getElementById('previewContainer');
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        preview.src = e.target.result;
        container.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    }
  }
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