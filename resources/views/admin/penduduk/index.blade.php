@extends('admin.dashboard')
@section('content')
<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Data Penduduk per Dusun/Kampung</h2>
    <a href="{{ route('admin.infografis.create') }}"
      class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-lg shadow-md font-medium transition-all duration-300 hover:scale-105 flex items-center gap-2">
      <i data-lucide="plus-circle" class="w-5 h-5"></i> Tambah Data
    </a>
  </div>

  @if(session('success'))
  <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md animate-fade-in" role="alert">
    <p>{{ session('success') }}</p>
  </div>
  @endif

  <div class="overflow-x-auto">
    <table class="min-w-full bg-white text-sm">
      <thead class="bg-slate-50">
        <tr>
          <th class="py-3 px-4 text-left font-semibold text-slate-600">Nama Dusun/Kampung</th>
          <th class="py-3 px-4 text-center font-semibold text-slate-600">Total Penduduk</th>
          <th class="py-3 px-4 text-center font-semibold text-slate-600">Laki-laki</th>
          <th class="py-3 px-4 text-center font-semibold text-slate-600">Perempuan</th>
          <th class="py-3 px-4 text-center font-semibold text-slate-600">Kepala Keluarga</th>
          <th class="py-3 px-4 text-center font-semibold text-slate-600">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-200">
        @forelse($penduduks as $item)
        <tr>
          <td class="py-3 px-4 font-medium text-slate-800">{{ $item->dusun }}</td>
          <td class="py-3 px-4 text-center">{{ $item->total_penduduk }}</td>
          <td class="py-3 px-4 text-center">{{ $item->laki_laki }}</td>
          <td class="py-3 px-4 text-center">{{ $item->perempuan }}</td>
          <td class="py-3 px-4 text-center">{{ $item->kepala_keluarga }}</td>
          <td class="py-3 px-4 text-center">
            <div class="flex justify-center items-center space-x-2">
              <a href="{{ route('admin.infografis.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800 transition-transform hover:scale-110"
                title="Edit Penduduk">
                <i data-lucide="edit" class="w-5 h-5"></i>
              </a>
              <form action="{{ route('admin.infografis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800 transition-transform hover:scale-110" title="Hapus penduduk">
                  <i data-lucide="trash-2" class="w-5 h-5"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="py-4 px-4 text-center text-slate-500">
            Belum ada data penduduk yang ditambahkan.
          </td>
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