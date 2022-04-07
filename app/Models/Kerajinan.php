<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerajinan extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_kerajinan',
        'id_pengrajin',
        'nama',
        'stok',
        'gambar',
        'harga'
    ];

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
