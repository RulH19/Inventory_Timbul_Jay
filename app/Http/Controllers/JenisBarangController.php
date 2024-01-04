<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    public function index()
    {
        $jenisBarang = JenisBarang::get();
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
    public function hapus($id)
    {
        JenisBarang::find($id)->delete();
        return redirect()->route('jenisBarang');
    }
}
