<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function getMapData()
    {
        // Path ke file JSON
        $path = storage_path('app/public/json/map-data.json');

        // Memeriksa apakah file ada
        if (!file_exists($path)) {
            return response()->json(['error' => 'File JSON tidak ditemukan'], 404);
        }

        // Membaca isi file JSON
        $json = file_get_contents($path);

        // Decode JSON menjadi array PHP
        $data = json_decode($json, true);

        // Kembalikan data JSON sebagai respons
        return response()->json($data);
    }
}
