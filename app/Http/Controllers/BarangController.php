<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Barang::where('id_barang', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama_barang', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Barang::paginate(5);
        }
        return view('barang.index', ['data' => $data]);
    }
}
