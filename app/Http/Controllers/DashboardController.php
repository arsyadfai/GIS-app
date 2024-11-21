<?php

namespace App\Http\Controllers;

use App\Models\IKU;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $wilayah = Wilayah::all();
        $iku = IKU::all();
        return view('dashboard/index', ['wilayah' => $wilayah, 'iku' => $iku]);
    }

    function inputWilayah()
    {
        $wilayah = Wilayah::all();
        $iku = IKU::all();
        return view('dashboard/input-wilayah', ['wilayah' => $wilayah, 'iku' => $iku]);
    }

    function SimpanInputWilayah(Request $request)
    {
        $validated = $request->validate([
            'wilayah' => 'required|max:255',
            'data' => 'required',
        ]);

        $wilayah = Wilayah::create([
            'wilayah' => $validated['wilayah'],
            'data' => $validated['data']
        ]);

        return redirect('dashboard/input/wilayah');
    }

    function inputIKU()
    {
        $wilayah = Wilayah::all();
        $iku = IKU::all();
        return view('dashboard/input-iku', ['wilayah' => $wilayah, 'iku' => $iku]);
    }

    function SimpanInputIKU(Request $request)
    {
        $validated = $request->validate([
            'wilayah_id' => 'required|exists:wilayah,id', // Pastikan id wilayah ada di tabel wilayah
            'ipm' => 'nullable|numeric',
            'pertumbuhan_ekonomi' => 'nullable|numeric',
            'inflasi' => 'nullable|numeric',
            'indeks_gizi' => 'nullable|numeric',
            'pdrb' => 'nullable|numeric',
            'tingkat_pengangguran_terbuka' => 'nullable|numeric',
            'nilai_tukar_petani' => 'nullable|numeric',
            'angka_kemiskinan' => 'nullable|numeric',
            'indeks_pembangunan_gender' => 'nullable|numeric',
            'tahun' => 'required|integer|min:2000|max:2100', // Contoh validasi tahun
        ]);


        // Simpan data ke dalam tabel iku
        $iku = Iku::create([
            'wilayah_id' => $validated['wilayah_id'],
            'ipm' => $validated['ipm'],
            'pertumbuhan_ekonomi' => $validated['pertumbuhan_ekonomi'],
            'inflasi' => $validated['inflasi'],
            'indeks_gizi' => $validated['indeks_gizi'],
            'pdrb' => $validated['pdrb'],
            'tingkat_pengangguran_terbuka' => $validated['tingkat_pengangguran_terbuka'],
            'nilai_tukar_petani' => $validated['nilai_tukar_petani'],
            'angka_kemiskinan' => $validated['angka_kemiskinan'],
            'indeks_pembangunan_gender' => $validated['indeks_pembangunan_gender'],
            'tahun' => $validated['tahun'],
        ]);


        return redirect('dashboard/input/iku');
    }

}
