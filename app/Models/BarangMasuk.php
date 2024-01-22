<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barangMasuk';

    protected $fillable = [
        'id_barang',
        'harga',
        'stok',
        'nama_penerima',
        'gambar',
        'tanggal'
    ];
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }
}
