<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable=[
        'kode_sampah',
        'nama'
    ];

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function sampah()
    {
        return $this->hasMany(Sampah::class, 'kode_jenis');
    }
}
