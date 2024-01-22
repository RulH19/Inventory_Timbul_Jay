<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // $totalKeuntungan = Barang::select(DB::raw("CAST(SUM((harga_jual - harga_beli) * terjual)as int) as totalKeuntungan"))->GroupBy(DB::raw("Month(created_at)"))->pluck('totalKeuntungan');
        $laporanData = BarangKeluar::join('barang', 'barang.id_barang', '=', 'barangKeluar.id_barang')
            ->select(
                'barang.id_barang',
                DB::raw("CAST(SUM((barang.harga_jual - barang.harga_beli) * barangKeluar.stok) as int) as totalKeuntungan"),
                DB::raw("MONTH(barangKeluar.tanggal) as bulan")
            )
            ->groupBy('barang.id_barang', DB::raw('MONTH(barangKeluar.tanggal)'))
            ->get();

        $seriesData = [];
        foreach ($laporanData as $item) {
            $seriesData[] = [
                'name' => $item->id_barang,
                'data' => [$item->totalKeuntungan],
                'bulan' => $item->bulan,
            ];
        }
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('laporan.index', compact('seriesData', 'bulan'));
    }
}
