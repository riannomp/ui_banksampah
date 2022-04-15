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
    protected $primaryKey = 'id_karyawan';

    public function user()
    {
        return $this->hasOne(User::class, 'id_karyawan');
    }
}
