<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSeeder extends Seeder
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

            ],
            [
                'id_barang' => 'ARR-025',
                'nama_barang' => 'Bufet Pajangan 1 Pintu sakura',

            ],
            [
                'id_barang' => 'AF-060',
                'nama_barang' => 'Bufet Pajangan 2 Pintu jml',

            ],
            [
                'id_barang' => 'AF-031',
                'nama_barang' => 'Bufet Pajangan 3 Pintu jml',

            ],
            [
                'id_barang' => 'JPH-020',
                'nama_barang' => 'Bufet Pajangan 3 Pintu kembang',

            ],
            [
                'id_barang' => 'DEV-001',
                'nama_barang' => 'Bufet Pajangan 3 Pintu putih',

            ],
            [
                'id_barang' => 'ALP-014',
                'nama_barang' => 'Bufet Pajangan minimalis piala 100cm',

            ],
            [
                'id_barang' => 'ARR-010',
                'nama_barang' => 'Bufet Pajangan samba 4 pintu',

            ],
            [
                'id_barang' => 'DAF-008',
                'nama_barang' => 'Bufet Pajangan tv hpl 180',

            ],
            [
                'id_barang' => 'AKV-019',
                'nama_barang' => 'Baby locker spin BL 120',

            ],
            [
                'id_barang' => 'CSO-001',
                'nama_barang' => '2in1 Karakter timbul',

            ],
            [
                'id_barang' => 'MHT-022',
                'nama_barang' => '2in1 teenager 100x200 escon',

            ],
            [
                'id_barang' => 'FLO-015',
                'nama_barang' => '3in1 parteen uk. 120',

            ],
        ];
        DB::table('jenisBarang')->insert($data);
    }
}
