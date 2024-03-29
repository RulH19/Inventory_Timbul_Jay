<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BarangMasukController extends Controller
{
    public function index(Request $request)
    {


        // Tambahkan kondisi pencarian jika ada input 'search'
        if ($request->has('search')) {
            $barang = BarangMasuk::where('id_barang', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama_penerima', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $barang = BarangMasuk::paginate(5);
        }


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
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->file('gambar')->getClientOriginalName(),
            'nama_penerima' => $request->nama_penerima,
            'tanggal' => $request->tanggal_input
        ];

        BarangMasuk::create($data);
        Alert::success('Berhasil', 'Data Telah Ditambah');
        $data2 = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->file('gambar')->getClientOriginalName()
        ];
        if (Barang::where('id_barang', $request->id_barang)->value('id_barang')) {
            // Jika data sudah ada, lakukan update quantity
            Barang::where('id_barang', $request->id_barang, )->increment('stok', $request->stok);
        } else {
            // Jika data belum ada, lakukan insert
            $request->file('gambar')->move('img/', $request->file('gambar')->getClientOriginalName());
            Barang::create($data2);
        }

        return redirect()->route('barangMasuk');
    }
    public function edit($id)
    {
        $jenisBarang = JenisBarang::get();
        $barang = BarangMasuk::find($id);
        $stokToDecrement = $barang->stok;
        Barang::where('id_barang', $barang->id_barang)->decrement('stok', $stokToDecrement);
        return view('barangMasuk.form', ['barang' => $barang, 'jenisBarang' => $jenisBarang]);
    }
    public function update($id, Request $request)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'nama_penerima' => $request->nama_penerima,
            'gambar' => $request->file('gambar')->getClientOriginalName(),
            'tanggal' => $request->tanggal_input
        ];

        BarangMasuk::find($id)->update($data);
        Alert::info('Berhasil', 'Data Telah diperbarui');
        $data2 = [
            'id_barang' => $request->id_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->file('gambar')->getClientOriginalName()
        ];
        if (Barang::where('id_barang', $request->id_barang)->exists()) {
            Barang::where('id_barang', $request->id_barang, )->increment('stok', $request->stok);
        } else {

            Barang::create($data2);
        }
        return redirect()->route('barangMasuk');
    }
    public function hapusBarangMasuk($id, Request $request)
    {
        $id_barang = $request->input('id_barang');
        $barangMasuk = BarangMasuk::find($id_barang);
        $stokToDecrement = $barangMasuk->stok;
        Barang::where('id_barang', $barangMasuk->id_barang)->decrement('stok', $stokToDecrement);

        if ($barangMasuk) {
            $barangMasuk->nama_barang = $id_barang;
            $barangMasuk->delete();

            return redirect()->route('barangMasuk');
        }
    }
}
