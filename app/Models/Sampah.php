<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sampah',
        'id_jenis',
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
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }
    public function detail_setor()
    {
        return $this->hasMany(DetailSetoran::class, 'id_sampah');
    }
    public function detail_jual_sampah()
    {
        return $this->belongsTo(DetailJualsampah::class, 'id_sampah');
    }   
}
