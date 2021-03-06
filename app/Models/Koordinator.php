<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'foto',
        'alamat',
        'no_hp',
        'total'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $primaryKey = 'id_koor';
    public function user()
    {
        return $this->hasMany(User::class, 'id_koor');
    }
    public function setoran()
    {
        return $this->hasOne(Setoran::class, 'id_koor');
    }
    public function nasabah()
    {
        return $this->hasOne(Nasabah::class, 'id_koor');
    }
    public function total($id)
    {
        $setoran = Setoran::where('id_koor', $id)->get();
        $total = 0;
        foreach ($setoran as $key => $value) {
            $total = $total + $value->total_koor;
        }
        return $total;
    }
    public function tarik($id, $transaksi)
    {
        $koor = Koordinator::where('id_koor', $id)->first();
        $saldo = $koor->saldo - $transaksi;

        return $saldo;
    }
}
