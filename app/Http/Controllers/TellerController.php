<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\Sampah;
use Illuminate\Http\Request;

class TellerController extends Controller
{
    public function dataSampah()
    {
        $data_sampah = Sampah::all();
        // dd($data_sampah);
        return view('teller.data_sampah', compact('data_sampah'));
    }

    public function addSampah()
    {
        return view('teller.add_sampah');
    }

    public function addSampah2(Request $request)
    {
        if ($request->gambar) {
            $namaFile = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img'), $namaFile);


            $kode = strtoupper(substr($request->nama_sampah, 0, 3));
            $check = count(DataSampah::where('id_sampah', 'like', "%$kode%")->get()->toArray());
            $angka = sprintf("%03d", (int)$check + 1);
            $id_sampah = $kode . "" . $angka;

            DataSampah::create([

                'nama_sampah' => $request->nama_sampah,
                'id_sampah' => $id_sampah,
                'jenis' => $request->jenis_sampah,
                'jumlah' => $request->jumlah,
                'gambar' => $namaFile,
                'harga' => $request->harga
            ]);
        } else {


            $kode = strtoupper(substr($request->nama_sampah, 0, 3));
            $check = count(DataSampah::where('id_sampah', 'like', "%$kode%")->get()->toArray());
            $angka = sprintf("%03d", (int)$check + 1);
            $id_sampah = $kode . "" . $angka;

            DataSampah::create([

                'nama_sampah' => $request->nama_sampah,
                'id_sampah' => $id_sampah,
                'jenis' => $request->jenis_sampah,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga
            ]);
        }

        return redirect('teller/data_sampah');
    }

    public function editSampah($id)
    {
        $sampah = DataSampah::find($id);
        return view('teller.edit_sampah',compact('sampah'));
    }
    public function updateSampah(Request $request)
    {
        if ($request->gambar) {
            $namaFile = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img'), $namaFile);

            DataSampah::where('id',$request->edit_id)
            ->update([

                'nama_sampah' => $request->edit_nama_sampah,
                'kode_sampah' => $request->edit_kode_sampah,
                'jenis' => $request->edit_jenis_sampah,
                'jumlah' => $request->edit_jumlah,
                'gambar' => $namaFile,
                'harga' => $request->edit_harga
            ]);
        } else {

            DataSampah::where('id', $request->edit_id)
            ->update([

                'nama_sampah' => $request->edit_nama_sampah,
                'kode_sampah' => $request->edit_kode_sampah,
                'jenis' => $request->edit_jenis_sampah,
                'jumlah' => $request->edit_jumlah,
                'harga' => $request->edit_harga
            ]);
        }
        return redirect('teller/data_sampah');
    }
    public function dataNasabah()
    {
        return view('teller.data_nasabah');
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
        return view('teller.setoran_add');
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
