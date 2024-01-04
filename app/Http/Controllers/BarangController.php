<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all(); // Mengambil semua data dari tabel menggunakan model
        return view('barang.index', ['data' => $data]);
    }
}