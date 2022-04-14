<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_jenis',
        'nama'
    ];

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $primaryKey = 'id_jenis';
    public $incrementing = false;

    public function sampah()
    {
        return $this->hasMany(Sampah::class, 'id_sampah');
    }
}
