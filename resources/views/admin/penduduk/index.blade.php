@extends('admin.dashboard')
@section('content')
<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Data Penduduk per Dusun/Kampung</h2>
    <a href="{{ route('admin.infografis.create') }}"
      class="bg-emerald-500 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-emerald-600 transition-colors flex items-center">
      <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
      Tambah Data
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
              <a href="{{ route('admin.infografis.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 p-1 rounded-md hover:bg-blue-100 transition-colors" aria-label="Edit">
                <i data-lucide="edit-2" class="w-4 h-4"></i>
              </a>
              <form action="{{ route('admin.infografis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 p-1 rounded-md hover:bg-red-100 transition-colors" aria-label="Hapus">
                  <i data-lucide="trash-2" class="w-4 h-4"></i>
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
@endsection