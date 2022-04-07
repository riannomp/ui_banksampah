<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengrajin extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_pengrajin',
        'nama',
        'alamat',
        'no_telp'
    ];

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function jual_sampah()
    {
        return $this->belongsTo(PenjualanSampah::class, 'id_pengrajin');
    }
}
