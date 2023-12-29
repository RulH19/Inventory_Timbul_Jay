<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barang = BarangMasuk::get();

        return view('barangMasuk.index', ['data' => $barang]);
    }
    public function tambah()
    {
        $jenisBarang = JenisBarang::get();
        return view('barangMasuk.form', ['jenisBarang' => $jenisBarang]);
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'nama_penerima' => $request->nama_penerima
        ];

        BarangMasuk::create($data);

        return redirect()->route('barangMasuk');
    }
    public function edit($id)
    {
        $jenisBarang = JenisBarang::get();
        $barang = BarangMasuk::find($id)->first();
        return view('barangMasuk.form', ['barang' => $barang, 'jenisBarang' => $jenisBarang]);
    }
    public function update($id, Request $request)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'nama_penerima' => $request->nama_penerima
        ];

        BarangMasuk::find($id)->update($data);

        return redirect()->route('barangMasuk');
    }
    public function hapus($id)
    {
        BarangMasuk::find($id)->delete();

        return redirect()->route('barangMasuk');
    }
}
