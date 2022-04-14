<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
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
                'harga' => $request->harga
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
                'harga' => $request->harga
            ]);

        }
        return redirect()->back();
    }

    public function dataNasabah()
    {
        return view('admin.data_nasabah');
    }


    public function dataSetoran()
    {
        return view('admin.setoran');
    }
    public function detailSetoran()
    {
        return view('admin.detailsetoran');
    }
    public function addSetor()
    {
        return view('admin.setoran_add');
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
        $jenis = Jenis::all();
        return view('admin.jenis', compact('jenis'));
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
        $user = User::all();
        return view('admin.data_user', compact('user'));
    }
    public function updateStatus(Request $request)
    {
        User::where('id', $request->edit_id)
        ->update([
            'status'    => $request->edit_status
        ]);
        return redirect('admin/data_user');
    }
}

