<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;
    protected $fillable=[
        'kode_nasabah',
        'nama',
        'foto',
        'alamat',
        'no_telp',
        'id_user'
    ];

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function setoran()
    {
        return $this->hasOne(Setoran::class, 'kode_nasabah');
    }
}
