@extends('admin.dashboard')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg animate-fadeIn">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Daftar Galeri</h2>
    <a href="{{ route('admin.galeri.create') }}" 
       class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-lg shadow-md font-medium transition-all duration-300 hover:scale-105">
      Tambah Galeri
    </a>
  </div>

  @if(session('success'))
  <div class="bg-emerald-100 text-emerald-700 border border-emerald-200 px-4 py-2 rounded-lg mb-6">
    {{ session('success') }}
  </div>
  @endif

  <div class="overflow-x-auto">
    <table class="min-w-full border border-slate-200 rounded-lg overflow-hidden">
      <thead class="bg-slate-100 text-slate-700 text-sm uppercase">
        <tr>
          <th class="py-3 px-4 text-left">Judul</th>
          <th class="py-3 px-4 text-left">Gambar</th>
          <th class="py-3 px-4 text-center w-32">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-slate-700 text-sm">
        @forelse($galeris as $galeri)
        <tr class="border-t border-slate-200 hover:bg-slate-50 transition-colors">
          <td class="py-3 px-4 font-medium">{{ $galeri->judul }}</td>
          <td class="py-3 px-4">
            @if($galeri->gambar)
            <img src="{{ asset('storage/' . $galeri->gambar) }}" 
                 alt="{{ $galeri->judul }}" 
                 class="w-20 h-20 object-cover rounded-lg shadow-sm hover:scale-105 transition-transform duration-300">
            @else
            <div class="w-20 h-20 flex items-center justify-center bg-emerald-100 text-emerald-600 font-semibold rounded-lg">
              N/A
            </div>
            @endif
          </td>
          <td class="py-3 px-4 text-center">
            <div class="flex justify-center gap-3">
              <a href="{{ route('admin.galeri.edit', $galeri->id) }}" 
                 class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Edit</a>
              <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800 font-medium transition-colors">
                  Hapus
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center py-8 text-slate-500">Belum ada galeri yang tersedia.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
  });
</script>

<style>
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fadeIn {
    animation: fadeIn 0.5s ease-out forwards;
  }
</style>
@endsection
