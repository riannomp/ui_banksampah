<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama',
        'foto',
        'alamat',
        'no_telp',
    ];

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function user()
    {
        return $this->hasMany(User::class, 'id_karyawan');
    }
}
