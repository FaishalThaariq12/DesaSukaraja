@extends('admin.dashboard')
@section('content')
<h2 class="text-xl font-bold mb-4">Upload Bagan Organisasi</h2>
<form action="{{ route('admin.sotk.bagan.upload') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-4">
    <label for="bagan" class="block">Bagan Organisasi (gambar)</label>
    <input type="file" name="bagan" id="bagan" class="border rounded w-full p-2" accept="image/*" required>
  </div>
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
</form>
@endsection