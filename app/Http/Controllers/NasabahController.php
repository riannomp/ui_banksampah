<?php

namespace App\Http\Controllers;

use App\Models\DetailSetoran;
use App\Models\Nasabah;
use App\Models\Setoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasabahController extends Controller
{
    public function tabungan()
    {
        $user = Auth::user();
        $setoran = Setoran::all()->where('id_nasabah', '', $user->id_nasabah);
        return view('nasabah.data_tabungan',compact('user','setoran'));
    }

    public function saldo()
    {
        # code...
    }

    public function detailSetoran($id_setoran)
    {
        $user = Auth::user();
        $data_setor = Setoran::where('id_setoran', $id_setoran)->get();
        $detail_setor = DetailSetoran::where('id_setoran', $id_setoran)->get();
        $total = DetailSetoran::where('id_setoran', $id_setoran)->sum('subtotal');

        return view('admin.detailsetoran',compact('user','data_setor','detail_setor','total', 'id_setoran'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('nasabah.profie', compact('user'));
    }
}
