<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\IKU;
use Illuminate\Http\Request;

class webController extends Controller
{
    public function index()
    {

        $wilayah = Wilayah::all();
        $iku = IKU::all();
        return view('layouts.frontend', ['wilayah' => $wilayah, 'iku' => $iku]);
    }
}
