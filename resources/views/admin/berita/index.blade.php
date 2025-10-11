@extends('admin.dashboard')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg animate-fadeIn">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Kelola Berita</h2>
    <a href="{{ route('admin.berita.create') }}"
      class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-lg shadow-md font-medium transition-all duration-300 hover:scale-105 flex items-center gap-2">
      <i data-lucide="plus-circle" class="w-5 h-5"></i> Tambah Berita
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
          <th class="py-3 px-4 text-left">Slug</th>
          <th class="py-3 px-4 text-left">Tanggal Dibuat</th>
          <th class="py-3 px-4 text-center w-32">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-slate-700 text-sm">
        @forelse($beritas as $berita)
        <tr class="border-t border-slate-200 hover:bg-slate-50 transition-colors">
          <td class="py-3 px-4 font-medium">{{ $berita->judul }}</td>
          <td class="py-3 px-4 text-slate-500">{{ $berita->slug }}</td>
          <td class="py-3 px-4 text-slate-500">{{ $berita->created_at->format('d M Y') }}</td>
          <td class="py-3 px-4 text-center">
            <div class="flex justify-center gap-3">
              <!-- Tombol Edit -->
              <a href="{{ route('admin.berita.edit', $berita->id) }}"
                class="text-blue-600 hover:text-blue-800 transition-transform hover:scale-110"
                title="Edit Berita">
                <i data-lucide="edit" class="w-5 h-5"></i>
              </a>

              <!-- Tombol Hapus -->
              <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800 transition-transform hover:scale-110" title="Hapus Berita">
                  <i data-lucide="trash-2" class="w-5 h-5"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center py-8 text-slate-500">Belum ada berita yang tersedia.</td>
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