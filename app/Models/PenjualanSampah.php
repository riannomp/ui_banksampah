<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanSampah extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_penjualan',
        'kode_sampah',
        'kode_pengrajin',
        'total_harga',
        'tanggal',
        'pic_teller'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function sampah()
    {
        return $this->belongsTo(Sampah::class, 'kode_sampah');
    }
}
