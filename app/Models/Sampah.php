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
        'keterangan',
        'harga_nasabah',
        'harga_koordinator',
        'gambar'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $primaryKey = 'id_sampah';
    public $incrementing = false;

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }
    public function detail_setor()
    {
        return $this->hasMany(DetailSetoran::class, 'id_sampah');
    }
}
