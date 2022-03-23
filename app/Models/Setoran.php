<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_nasabah',
        'kode_koor',
        'total_harga',
        'tanggal'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'kode_nasabah');
    }
    public function koor()
    {
        return $this->belongsTo(Koordinator::class, 'kode_koor');
    }
    public function detail()
    {
        return $this->hasOne(DetailSetoran::class, 'kode_setor');
    }
}
