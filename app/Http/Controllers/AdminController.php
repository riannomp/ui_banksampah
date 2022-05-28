<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dataSampah()
    {
        $user = Auth::user();
        $sampah = Sampah::all();
        $jenis = Jenis::all();
        return view('admin.data_sampah', compact('user','sampah','jenis'));
    }

    //view addsampah
     public function addSampahView()
     {
        $user = Auth::user();
        $jenis = Jenis::all();
        return view('admin.tambah_sampah',compact('user','jenis'));
     }

    //action
    public function addSampah(Request $request)
    {
        if ($request->gambar) {
            $namaFile = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/logo'), $namaFile);

            $kode = strtoupper(substr($request->nama, 0, 3));
            $check = count(Sampah::where('id_sampah', 'like', "%$kode%")->get()->toArray());
            $angka = sprintf("%03d", (int)$check + 1);
            $id_sampah = $kode . "" . $angka;

            Sampah::create([
                'nama'      => $request->nama,
                'id_sampah' => $id_sampah,
                'id_jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'gambar' => $namaFile,
                'harga_nasabah' => $request->harga_nasabah,
                'harga_koordinator' => $request->harga_koordinator
            ]);
        } else {

            $kode = strtoupper(substr($request->nama, 0, 3));
            $check = count(Sampah::where('id_sampah', 'like', "%$kode%")->get()->toArray());
            $angka = sprintf("%03d", (int)$check + 1);
            $id_sampah = $kode . "" . $angka;

            Sampah::create([
                'nama'      => $request->nama,
                'id_sampah' => $id_sampah,
                'gambar' => 'no_image.png',
                'id_jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'harga_nasabah' => $request->harga_nasabah,
                'harga_koordinator' => $request->harga_koordinator
            ]);

        }
        return redirect()->back();
    }
    public function updateSampah(Request $request)
    {
        if ($request->edit_gambar) {
            $namaFile = time() . '.' . $request->edit_gambar->extension();
            $request->edit_gambar->move(public_path('img/logo'), $namaFile);

            Sampah::where('id_sampah', $request->edit_id)
                ->update([

                    'nama' => $request->edit_nama,
                    'gambar' => $namaFile,
                    'harga_nasabah' => $request->edit_harga_nasabah,
                    'harga_koordinator' => $request->edit_harga_koordinator
                ]);
        } else {

            Sampah::where('id_sampah', $request->edit_id)
                ->update([
                    'nama' => $request->edit_nama,
                    'harga_nasabah' => $request->edit_harga_nasabah,
                    'harga_koordinator' => $request->edit_harga_koordinator
                ]);
        }
        return redirect()->back();
    }
    public function dataNasabah()
    {
        $user = Auth::user();
        $nasabah = Nasabah::all();
        return view('admin.data_nasabah',compact('nasabah','user'));
    }


    public function dataSetoran()
    {
        $user = Auth::user();
        return view('admin.setoran', compact('user'));
    }
    public function detailSetoran()
    {
        $user = Auth::user();
        return view('admin.detailsetoran',compact('user'));
    }
    public function addSetor()
    {
        $user = Auth::user();
        return view('admin.setoran_add',compact('user'));
    }


    public function dataSupplier()
    {
        return view('admin.supplier');
    }
    public function dataKerajinan()
    {
        return view('admin.kerajinan');
    }
    public function dataPenjualan()
    {
        return view('admin.penjualan');
    }
    public function dataJenis()
    {
        $user = Auth::user();
        $jenis = Jenis::all();
        return view('admin.jenis', compact('jenis','user'));
    }

    public function addJenis(Request $request)
    {
        $kode = strtoupper(substr("JNS", 0, 3));
        $check = count(Jenis::where('id_jenis', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $id_jenis = $kode . "" . $angka;

        Jenis::create([
            'id_jenis' => $id_jenis,
            'nama' => $request->nama
        ]);
        return redirect()->back();

    }
    public function dataUser()
    {
        $user = Auth::user();
        $usr = User::all();
        return view('admin.data_user', compact('user','usr'));
    }
    public function updateStatus(Request $request)
    {
        User::where('id_user', $request->edit_id)
        ->update([
            'status'    => $request->edit_status
        ]);
        return redirect('admin/data_user');
    }
}

