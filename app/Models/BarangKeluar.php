<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barangKeluar';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'harga',
        'stok',
        'nama_customer'
    ];
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }
}
