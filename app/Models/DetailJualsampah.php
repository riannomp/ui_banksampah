<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJualsampah extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_detail',
        'id_penjualan',
        'jumlah',
        'harga',
        'subtotal',
        'total'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function sampah()
    {
        return $this->hasMany(Sampah::class, 'id_sampah');
    }
    public function jual_sampah()
    {
        return $this->hasOne(PenjualanSampah::class, 'id_penjualan');
    }
}
