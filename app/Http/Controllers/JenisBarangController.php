<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class JenisBarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $jenisBarang = JenisBarang::where('id_barang', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama_barang', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $jenisBarang = JenisBarang::paginate(5);
        }
        return view("jenisBarang/index", ['jenisBarang' => $jenisBarang]);
    }
    public function tambah()
    {
        return view('jenisBarang.form');

    }
    public function simpan(Request $request)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang
        ];
        if (JenisBarang::where('id_barang', $request->id_barang)->value('id_barang')) {
            alert()->error('Gagal', 'Id Barang Sudah Tersedia');
            return redirect()->route('jenisBarang');
        } else {
            JenisBarang::create($data);
            Alert::success('Berhasil', 'Data Telah Ditambah');
        }
        return redirect()->route('jenisBarang');
    }

    public function edit($id)
    {
        $jenisBarang = JenisBarang::find($id);
        return view('jenisBarang.form', ['jenisBarang' => $jenisBarang]);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang
        ];

        JenisBarang::find($id)->update($data);

        return redirect()->route('jenisBarang');
    }
    public function hapusJenisBarang($id, Request $request)
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
