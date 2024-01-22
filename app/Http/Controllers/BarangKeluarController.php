<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangKeluarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $barang = BarangKeluar::where('id_barang', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama_customer', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $barang = BarangKeluar::paginate(5);
        }

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
            'harga' => $request->harga,
            'stok' => $request->stok,
            'nama_customer' => $request->nama_customer,
            'tanggal' => $request->tanggal_input
        ];
        $barang = Barang::where('id_barang', $request->id_barang)->first();
        Alert::success('Berhasil', 'Data Telah Ditambah');
        $kondisi = Barang::where('id_barang', $request->id_barang)->exists();
        if (!$kondisi) {
            Alert::error('Gagal', 'Tidak ada barang');
            return redirect()->back()->with('Gagal', 'Tidak ada barang');
        } else if ($barang && $barang->stok >= $request->stok) {
            Barang::where('id_barang', $request->id_barang)->decrement('stok', $request->stok);
            Barang::where('id_barang', $request->id_barang)->increment('terjual', $request->stok);
            BarangKeluar::create($data);
        } else {
            Alert::error('Gagal', 'Stock Tidak Mencukupi');
            return redirect()->back()->with('Gagal', 'Stock Tidak Mencukupi');
        }
        return redirect()->route('barangKeluar');
    }
    public function edit($id)
    {
        $barang = BarangKeluar::find($id);
        $stokToDecrement = $barang->stok;
        Barang::where('id_barang', $barang->id_barang)->increment('stok', $stokToDecrement);
        Barang::where('id_barang', $barang->id_barang)->decrement('terjual', $stokToDecrement);
        $jenisBarang = JenisBarang::get();
        return view('barangKeluar.form', ['barang' => $barang, 'jenisBarang' => $jenisBarang]);
    }
    public function update($id, Request $request)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'nama_customer' => $request->nama_customer,
            'tanggal' => $request->tanggal_input
        ];

        BarangKeluar::find($id)->update($data);
        Alert::info('Berhasil', 'Data Telah diperbarui');
        $barang = Barang::where('id_barang', $request->id_barang)->first();

        if ($barang && $barang->stok >= $request->stok) {
            Barang::where('id_barang', $request->id_barang)->decrement('stok', $request->stok);
            Barang::where('id_barang', $request->id_barang)->increment('terjual', $request->stok);
        } else {
            Alert::error('Gagal', 'Stock Tidak Mencukupi');
            return redirect()->back()->with('Gagal', 'Stock Tidak Mencukupi');
        }
        return redirect()->route('barangKeluar');
    }
    public function hapusBarangKeluar($id, Request $request)
    {
        $id_barang = $request->input('id_barang');
        $barangKeluar = BarangKeluar::find($id_barang);
        $stokToDecrement = $barangKeluar->stok;
        Barang::where('id_barang', $barangKeluar->id_barang)->increment('stok', $stokToDecrement);

        if ($barangKeluar) {
            $barangKeluar->nama_barang = $id_barang;
            $barangKeluar->delete();

            return redirect()->route('barangKeluar');
        }

    }
}
