<?php

namespace App\Http\Controllers;


use App\Models\Barang;
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
        $data2 = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];
        if (Barang::where('id_barang', $request->id_barang)->value('id_barang')) {
            // Jika data sudah ada, lakukan update quantity
            Barang::where('id_barang', $request->id_barang, )->increment('stok', $request->stok);
        } else {
            // Jika data belum ada, lakukan insert
            Barang::create($data2);
        }

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

        $data2 = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];
        if (Barang::where('id_barang', $request->id_barang)->value('id_barang')) {
            // Jika data sudah ada, lakukan update quantity
            Barang::where('id_barang', $request->id_barang, )->increment('stok', $request->stok);
        } else {
            // Jika data belum ada, lakukan insert
            Barang::create($data2);
        }
        return redirect()->route('barangMasuk');
    }
    public function hapus($id)
    {
        BarangMasuk::find($id)->delete();

        return redirect()->route('barangMasuk');
    }
}
