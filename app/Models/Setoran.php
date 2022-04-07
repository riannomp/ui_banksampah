<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_setoran',
        'id_nasabah',
        'id_koor',
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
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }
    public function koor()
    {
        return $this->belongsTo(Koordinator::class, 'id_koor');
    }
    public function detail()
    {
        return $this->hasOne(DetailSetoran::class, 'id_setoran');
    }
}
