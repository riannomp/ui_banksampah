<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_sampah',
        'kode_jenis',
        'nama',
        'jumlah',
        'harga',
        'gambar'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'kode_jenis');
    }
    public function detail_setor()
    {
        return $this->hasMany(DetailSetoran::class, 'kode_sampah');
    }
    public function penjualan()
    {
        return $this->hasMany(PenjualanSampah::class, 'kode_sampah');
    }
}
