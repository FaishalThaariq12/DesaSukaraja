@extends('admin.dashboard')
@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg animate-fadeIn max-w-lg mx-auto">
  <h2 class="text-2xl font-bold text-slate-800 mb-6">Edit Foto Detail Galeri</h2>
  <form action="{{ route('admin.galeri.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')
    <div>
      <label for="foto" class="block text-sm font-medium text-slate-700 mb-1">Ganti Foto (opsional)</label>
      <input type="file" name="foto" id="foto" accept="image/*"
        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200">
      @if($foto->path)
      <div class="mt-4">
        <span class="text-xs text-slate-500">Foto saat ini:</span>
        <img src="{{ asset('storage/' . $foto->path) }}" alt="Foto Detail" class="h-32 rounded-lg shadow-md mt-2 border border-slate-200">
      </div>
      @endif
    </div>
    <div>
      <label for="caption" class="block text-sm font-medium text-slate-700 mb-1">Caption</label>
      <input type="text" name="caption" id="caption" value="{{ $foto->caption }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg">
    </div>
    <div class="mt-8 flex justify-end">
      <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-2.5 rounded-lg shadow-md hover:bg-blue-700 transform hover:scale-105 transition-all duration-300">Update Foto</button>
    </div>
  </form>
</div>
@endsection