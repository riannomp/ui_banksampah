<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\Jenis;
use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\Setoran;
use Illuminate\Http\Request;

class TellerController extends Controller
{
    public function dataSampah()
    {
        $sampah = Sampah::all();
        $jenis = Jenis::all();
        // dd($data_sampah);
        return view('teller.data_sampah', compact('sampah','jenis'));
    }

    public function addSampah()
    {
        return view('teller.add_sampah');
    }

    public function addSampah2(Request $request)
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


    public function updateSampah(Request $request)
    {
        if ($request->edit_gambar) {
            $namaFile = time() . '.' . $request->edit_gambar->extension();
            $request->edit_gambar->move(public_path('img/logo'), $namaFile);

            Sampah::where('id_sampah',$request->edit_id)
            ->update([

                'nama' => $request->edit_nama,
                'jumlah' => $request->edit_jumlah,
                'gambar' => $namaFile,
                'harga' => $request->edit_harga
            ]);
        } else {

            Sampah::where('id_sampah', $request->edit_id)
            ->update([
                'nama' => $request->edit_nama,
                'jumlah' => $request->edit_jumlah,
                'harga' => $request->edit_harga
            ]);
        }
        return redirect()->back();
    }
    public function dataNasabah()
    {
        $nasabah = Nasabah::all();
        return view('teller.data_nasabah', compact('nasabah'));
    }
    public function addNasabah()
    {
        return view('teller.addnasabah');
    }

    public function dataSetoran()
    {
        return view('teller.setoran');
    }
    public function addSetoran()
    {
        $kode = strtoupper(substr("SET", 0, 3));
        $check = count(Setoran::where('id_setoran', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $id_setoran = $kode . "" . $angka;

        $nasabah = Nasabah::all();
        $sampah = Sampah::all();
        return view('teller.setoran_add', compact('nasabah','sampah','id_setoran'));
    }
    public function detailSetoran()
    {
        return view('teller.detailsetoran');
    }
    public function dataSupplier()
    {
        return view('teller.supplier');
    }
    public function dataKerajinan()
    {
        return view('teller.kerajinan');
    }
    public function dataTransaksiSampah()
    {
        return view('teller.transaksi_sampah');
    }
    public function dataTransaksiProduk()
    {
        return view('teller.transaksi_produk');
    }

}
