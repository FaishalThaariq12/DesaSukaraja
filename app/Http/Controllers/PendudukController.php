<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduks = Penduduk::orderBy('dusun')->get();
        return view('admin.penduduk.index', compact('penduduks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dusun' => 'required|string|max:100',
            'bulan' => 'required|string|max:20',
            'tahun' => 'required|integer|min:2000',
            // Kolom lain boleh kosong
        ]);
        $data = $request->all();
        // Set semua kolom integer kosong jadi 0
        $integerFields = [
            'total_penduduk',
            'kepala_keluarga',
            'laki_laki',
            'perempuan',
            'jumlah_kk',
            'wajib_ktp',
            'sudah_kk',
            'belum_kk',
            'sudah_ktp',
            'belum_ktp',
            'lahir',
            'datang',
            'mati',
            'pindah',
            'penduduk_bulan_lalu',
            'penduduk_bulan_ini',
            'wni',
            'wna',
            'kelompok_usia_0_5',
            'kelompok_usia_6_11',
            'kelompok_usia_12_17',
            'kelompok_usia_18_25',
            'kelompok_usia_26_35',
            'kelompok_usia_36_45',
            'kelompok_usia_46_60',
            'kelompok_usia_61_keatas'
        ];
        foreach ($integerFields as $field) {
            if (empty($data[$field])) {
                $data[$field] = 0;
            }
        }
        Penduduk::create($data);
        return redirect()->route('admin.infografis.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        return view('admin.penduduk.edit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $request->validate([
            'dusun' => 'required|string|max:100',
            'bulan' => 'required|string|max:20',
            'tahun' => 'required|integer|min:2000',
            // Kolom lain boleh kosong
        ]);
        $data = $request->all();
        $integerFields = [
            'total_penduduk',
            'kepala_keluarga',
            'laki_laki',
            'perempuan',
            'jumlah_kk',
            'wajib_ktp',
            'sudah_kk',
            'belum_kk',
            'sudah_ktp',
            'belum_ktp',
            'lahir',
            'datang',
            'mati',
            'pindah',
            'penduduk_bulan_lalu',
            'penduduk_bulan_ini',
            'wni',
            'wna',
            'kelompok_usia_0_5',
            'kelompok_usia_6_11',
            'kelompok_usia_12_17',
            'kelompok_usia_18_25',
            'kelompok_usia_26_35',
            'kelompok_usia_36_45',
            'kelompok_usia_46_60',
            'kelompok_usia_61_keatas'
        ];
        foreach ($integerFields as $field) {
            if (empty($data[$field])) {
                $data[$field] = 0;
            }
        }
        $penduduk->update($data);
        return redirect()->route('admin.infografis.index')->with('success', 'Data penduduk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('admin.infografis.index')->with('success', 'Data penduduk berhasil dihapus.');
    }
}
