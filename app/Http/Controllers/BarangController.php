<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::paginate(5);
        return view('barang.index', ['data' => $data]);
    }
}
