@extends('admin.dashboard')
@section('content')
<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
  <h2 class="text-2xl font-bold text-slate-800 mb-6">Kelola Data Penduduk per Dusun/Kampung</h2>

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
        <!-- Data statis, ganti dengan data dinamis jika sudah ada model/database -->
        <tr>
          <td class="py-3 px-4 font-medium text-slate-800">Kerajan</td>
          <td class="py-3 px-4 text-center">790</td>
          <td class="py-3 px-4 text-center">409</td>
          <td class="py-3 px-4 text-center">381</td>
          <td class="py-3 px-4 text-center">273</td>
          <td class="py-3 px-4 text-center">
            <a href="#" class="text-blue-500 hover:text-blue-700 p-1 rounded-md hover:bg-blue-100 transition-colors" aria-label="Edit">
              <i data-lucide="edit-2" class="w-4 h-4"></i>
            </a>
          </td>
        </tr>
        <tr>
          <td class="py-3 px-4 font-medium text-slate-800">Tegalkoneng</td>
          <td class="py-3 px-4 text-center">896</td>
          <td class="py-3 px-4 text-center">455</td>
          <td class="py-3 px-4 text-center">441</td>
          <td class="py-3 px-4 text-center">366</td>
          <td class="py-3 px-4 text-center">
            <a href="#" class="text-blue-500 hover:text-blue-700 p-1 rounded-md hover:bg-blue-100 transition-colors" aria-label="Edit">
              <i data-lucide="edit-2" class="w-4 h-4"></i>
            </a>
          </td>
        </tr>
        <tr>
          <td class="py-3 px-4 font-medium text-slate-800">Cilegengka</td>
          <td class="py-3 px-4 text-center">715</td>
          <td class="py-3 px-4 text-center">357</td>
          <td class="py-3 px-4 text-center">358</td>
          <td class="py-3 px-4 text-center">281</td>
          <td class="py-3 px-4 text-center">
            <a href="#" class="text-blue-500 hover:text-blue-700 p-1 rounded-md hover:bg-blue-100 transition-colors" aria-label="Edit">
              <i data-lucide="edit-2" class="w-4 h-4"></i>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</tbody>
</table>
</div>
</div>
@endsection