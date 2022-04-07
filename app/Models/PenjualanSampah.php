<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanSampah extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_penjualan',
        'id_pengrajin',
        'total_harga',
        'tanggal'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function detail_jual_sampah()
    {
        return $this->belongsTo(DetailJualsampah::class, 'id_penjualan');
    }
    public function pengrajin()
    {
        return $this->hasOne(Pengrajin::class, 'id_pengrajin');
    }
}
