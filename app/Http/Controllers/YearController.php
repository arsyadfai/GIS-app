<?php
// app/Http/Controllers/YearController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iku;

class YearController extends Controller
{
    public function index()
    {
        // Mengambil data tahun yang unik dari tabel iku
        $years = Iku::select('tahun')->distinct()->orderBy('tahun', 'desc')->get();

        // Mengirim data ke view
        return view('year.index', compact('years'));
    }
}
