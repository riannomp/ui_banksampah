<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sampah', 'kode_sampah', 'jenis', 'harga', 'jumlah', 'gambar', 'created_at', 'updated_at'
    ];

}
