<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSetoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_setor',
        'kode_sampah',
        'jumlah',
        'subtotal',
        'total'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function setoran()
    {
        return $this->belongsTo(Setoran::class, 'kode_setor');
    }
    public function sampah()
    {
        return $this->belongsTo(Sampah::class, 'kode_sampah');
    }
}
