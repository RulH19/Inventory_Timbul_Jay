<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id_barang' => 'AMI-061',
                'nama_barang' => 'Bufet Pajangan 1 Pintu jml',
                'harga_beli' => 1625000,
                'harga_jual' => 2112500,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'ARR-025',
                'nama_barang' => 'Bufet Pajangan 1 Pintu sakura',
                'harga_beli' => 1837800,
                'harga_jual' => 2389140,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'AF-060',
                'nama_barang' => 'Bufet Pajangan 2 Pintu jml',
                'harga_beli' => 2150000,
                'harga_jual' => 2795000,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'AF-031',
                'nama_barang' => 'Bufet Pajangan 3 Pintu jml',
                'harga_beli' => 2600000,
                'harga_jual' => 3380000,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'JPH-020',
                'nama_barang' => 'Bufet Pajangan 3 Pintu kembang',
                'harga_beli' => 7300000,
                'harga_jual' => 9490000,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'DEV-001',
                'nama_barang' => 'Bufet Pajangan 3 Pintu putih',
                'harga_beli' => 2750000,
                'harga_jual' => 3575000,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'ALP-014',
                'nama_barang' => 'Bufet Pajangan minimalis piala 100cm',
                'harga_beli' => 2750000,
                'harga_jual' => 3575000,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'ARR-010',
                'nama_barang' => 'Bufet Pajangan samba 4 pintu',
                'harga_beli' => 3532500,
                'harga_jual' => 4592250,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'DAF-008',
                'nama_barang' => 'Bufet Pajangan tv hpl 180',
                'harga_beli' => 4000000,
                'harga_jual' => 5200000,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'AKV-019',
                'nama_barang' => 'Baby locker spin BL 120',
                'harga_beli' => 363600,
                'harga_jual' => 653640,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'CSO-001',
                'nama_barang' => '2in1 Karakter timbul',
                'harga_beli' => 2950000,
                'harga_jual' => 3835000,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'MHT-022',
                'nama_barang' => '2in1 teenager 100x200 escon',
                'harga_beli' => 2352105,
                'harga_jual' => 3057736,
                'gambar' => "jpg",
                'stok' => 0,
            ],
            [
                'id_barang' => 'FLO-015',
                'nama_barang' => '3in1 parteen uk. 120',
                'harga_beli' => 3790557,
                'harga_jual' => 4927724,
                'gambar' => "jpg",
                'stok' => 0,
            ],
        ];
        DB::table('barang')->insert($data);
    }
}
