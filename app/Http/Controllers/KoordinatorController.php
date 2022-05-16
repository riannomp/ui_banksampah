<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\Setoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoordinatorController extends Controller
{
    public function dataSetoran()
    {
        $user = Auth::user();
        return view('koor.setoran', compact('user'));
    }
    public function addSetoran(Request $request)
    {
        $user = Auth::user();
        $kode = strtoupper(substr("SET", 0, 3));
        $check = count(Setoran::where('id_setoran', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $id_setoran = $kode . "" . $angka;

        $nasabah = Nasabah::all();
        $sampah = Sampah::all();

        // foreach($request->nama as $key => $value)
        // {
        //     DetailSetoran::create([

        //     ]);
        // }
        return view('koor.setoran_add', compact('nasabah', 'sampah', 'id_setoran','user'));
    }
    public function dataNasabah()
    {
        $user = Auth::user();
        $nasabah = Nasabah::all();
        return view('koor.data_nasabah', compact('nasabah','user'));
    }
}
