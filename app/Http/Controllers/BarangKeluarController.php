<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barang = BarangKeluar::get();

        return view('barangKeluar.index', ['data' => $barang]);
    }
    public function tambah()
    {
        $jenisBarang = JenisBarang::get();
        return view('barangKeluar.form', ['jenisBarang' => $jenisBarang]);
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'nama_customer' => $request->nama_customer
        ];

        BarangKeluar::create($data);
        $data2 = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];
        if (Barang::where('id_barang', $request->id_barang)->value('id_barang')) {
            // Jika data sudah ada, lakukan update quantity
            Barang::where('id_barang', $request->id_barang, )->decrement('stok', $request->stok);
        } else {
            // Jika data belum ada, lakukan insert
            Barang::create($data2);
        }
        return redirect()->route('barangKeluar');
    }
    public function edit($id)
    {
        $barang = BarangKeluar::find($id)->first();
        $jenisBarang = JenisBarang::get();
        return view('barangKeluar.form', ['barang' => $barang, 'jenisBarang' => $jenisBarang]);
    }
    public function update($id, Request $request)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'nama_customer' => $request->nama_customer
        ];

        BarangKeluar::find($id)->update($data);
        $data2 = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];
        if (Barang::where('id_barang', $request->id_barang)->value('id_barang')) {
            // Jika data sudah ada, lakukan update quantity
            Barang::where('id_barang', $request->id_barang, )->decrement('stok', $request->stok);
        } else {
            // Jika data belum ada, lakukan insert
            Barang::create($data2);
        }
        return redirect()->route('barangKeluar');
    }
    public function hapus($id)
    {
        BarangKeluar::find($id)->delete();

        return redirect()->route('barangKeluar');
    }
}
