<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'harga',
        'stok',
        'nama_penerima',
        'nama_pengirim'
    ];

    // Definisikan relasi ke model Kategori
    public function barangMasuk()
    {
        return $this->hasMany(Barang::class, 'id_barang');
    }

    public function barangKeluar()
    {
        return $this->hasMany(Barang::class, 'id_barang');
    }
}
