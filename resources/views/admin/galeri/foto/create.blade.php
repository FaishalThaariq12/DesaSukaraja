@extends('admin.dashboard')
@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg animate-fadeIn max-w-lg mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Tambah Foto Detail Galeri</h2>
    <a href="{{ route('admin.galeri.foto.index', $galeri->id) }}" class="text-sm text-slate-600 hover:text-emerald-500 flex items-center gap-1 bg-white border border-slate-300 px-4 py-2 rounded-lg shadow hover:bg-slate-100 transition-colors">
      <i data-lucide="arrow-left" class="w-4 h-4"></i> <span>Kembali</span>
    </a>
  </div>
  <form action="{{ route('admin.galeri.foto.store', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <div>
      <label for="foto" class="block text-sm font-medium text-slate-700 mb-1">Upload Foto</label>
      <input type="file" name="foto" id="foto" required accept="image/*"
        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200">
    </div>
    <div>
      <label for="caption" class="block text-sm font-medium text-slate-700 mb-1">Caption (opsional)</label>
      <input type="text" name="caption" id="caption" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg">
    </div>
    <div class="mt-8 flex justify-end">
      <button type="submit" class="bg-emerald-600 text-white font-semibold px-6 py-2.5 rounded-lg shadow-md hover:bg-emerald-700 transform hover:scale-105 transition-all duration-300">Tambah Foto</button>
    </div>
  </form>
</div>
@endsection