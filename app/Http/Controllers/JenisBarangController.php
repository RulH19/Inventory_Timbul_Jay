<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenisBarangController extends Controller
{
    public function index()
    {
        $jenisBarang = JenisBarang::paginate(5);
        return view("jenisBarang/index", ['jenisBarang' => $jenisBarang]);
    }
    public function tambah()
    {
        return view('jenisBarang.form');

    }
    public function simpan(Request $request)
    {

        if (JenisBarang::where('id_barang', $request->id_barang)->value('id_barang')) {
            return redirect()->route('jenisBarang');
        } else {
            JenisBarang::create(['id_barang' => $request->id_barang, 'nama_barang' => $request->nama_barang]);
            Alert::success('Berhasil', 'Data Telah Ditambah');
        }
        return redirect()->route('jenisBarang');
    }

    public function edit($id)
    {
        $jenisBarang = JenisBarang::find($id)->first();
        return view('jenisBarang.form', ['jenisBarang' => $jenisBarang]);
    }
    public function update(Request $request, $id)
    {
        JenisBarang::find($id)->update(['id_barang' => $request->id_barang, 'nama_barang' => $request->nama_barang]);
        return redirect()->route('jenisBarang');
    }
    // public function hapus($id)
    // {
    //     JenisBarang::find($id)->delete();
    //     return redirect()->route('jenisBarang');
    // }
    public function hapus($id, Request $request)
    {
        $id_barang = $request->input('id_barang');
        $jenisBarang = JenisBarang::find($id_barang);

        if ($jenisBarang) {
            $jenisBarang->nama_barang = $id_barang;
            $jenisBarang->delete();

            return redirect()->route('jenisBarang');
        }
    }
}
