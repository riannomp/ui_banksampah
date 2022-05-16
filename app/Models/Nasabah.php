<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama',
        'nik',
        'foto',
        'alamat',
        'no_hp',
        'id_koor'
    ];

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $primaryKey = 'id_nasabah';

    public function user()
    {
        return $this->hasMany(User::class, 'id_nasabah');
    }
    public function setoran()
    {
        return $this->hasOne(Setoran::class, 'id_nasabah');
    }
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_nasabah');
    }
    public function koordinator()
    {
        return $this->belongsTo(Koordinator::class, 'id_koor');
    }
}
