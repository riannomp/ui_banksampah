<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_nasabah',
        'id_koor',
        'penarikan',
        'setoran',
        'saldo',
        'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $primaryKey = 'id_transaksi';

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }

    public function KOOR()
    {
        return $this->belongsTo(Koordinator::class, 'id_koor');
    }

    // public function saldo($id)
    // {
    //     $setoran = Transaksi::where('id_nasabah', $id)->get();
    //     $saldo = 0;
    //     foreach ($setoran as $key => $value) {
    //         $saldo = $saldo - $value->setoran;
    //     }
    //     return $saldo;
    // }
}
