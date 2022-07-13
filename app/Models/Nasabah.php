<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class Nasabah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'foto',
        'alamat',
        'no_hp',
        'id_koor'
    ];

    protected $dates = [
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
    public function total($id)
    {
        $setoran = Setoran::where('id_nasabah', $id)->get();
        $total = 0;
        foreach ($setoran as $key => $value) {
            $total = $total + $value->total_harga;
        }
        return $total;
    }

    public function tarik($id, $transaksi)
    {
        $nasabah = Nasabah::where('id_nasabah', $id)->first();
        $saldo = $nasabah->saldo - $transaksi;

        return $saldo;
    }
}
