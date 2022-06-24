<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\DetailSetoran;
use App\Models\Jenis;
use App\Models\Koordinator;
use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\Setoran;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class TellerController extends Controller
{
    public function dataSampah()
    {
        $user   = Auth::user();
        $sampah = Sampah::all();
        $jenis  = Jenis::all();
        // dd($data_sampah);
        return view('teller.data_sampah', compact('sampah', 'jenis', 'user'));
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

            $kode       = strtoupper(substr($request->nama, 0, 3));
            $check      = count(Sampah::where('id_sampah', 'like', "%$kode%")->get()->toArray());
            $angka      = sprintf("%03d", (int)$check + 1);
            $id_sampah  = $kode . "" . $angka;

            Sampah::create([
                'nama'              => $request->nama,
                'id_sampah'         => $id_sampah,
                'id_jenis'          => $request->jenis,
                'harga_nasabah'     => $request->harga_nasabah,
                'harga_koordinator' => $request->harga_koordinator,
                'gambar'            => $namaFile
            ]);
        } else {

            $kode       = strtoupper(substr($request->nama, 0, 3));
            $check      = count(Sampah::where('id_sampah', 'like', "%$kode%")->get()->toArray());
            $angka      = sprintf("%03d", (int)$check + 1);
            $id_sampah  = $kode . "" . $angka;

            Sampah::create([
                'nama'              => $request->nama,
                'id_sampah'         => $id_sampah,
                'gambar'            => 'no_image.png',
                'id_jenis'          => $request->jenis,
                'harga_nasabah'     => $request->harga_nasabah,
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

                    'nama'              => $request->edit_nama,
                    'gambar'            => $namaFile,
                    'harga_nasabah'     => $request->edit_harga_nasabah,
                    'harga_koordinator' => $request->edit_harga_koordinator
                ]);
        } else {

            Sampah::where('id_sampah', $request->edit_id)
                ->update([
                    'nama'              => $request->edit_nama,
                    'harga_nasabah'     => $request->edit_harga_nasabah,
                    'harga_koordinator' => $request->edit_harga_koordinator
                ]);
        }
        return redirect()->back();
    }
    public function dataNasabah()
    {
        $user = Auth::user();
        $nasabah = Nasabah::all();
        return view('teller.data_nasabah', compact('nasabah', 'user'));
    }
    public function addNasabah()
    {
        $user = Auth::user();
        return view('teller.tambah_nasabah', compact('user'));
    }

    public function addNasabah2(Request $request)
    {
        $rules = [
            'nama'                  => 'required',
            'alamat'                => 'required',
            'nik'                   => 'required|min:16',
            'email'                 => 'required|email|unique:users,email',
            'no_hp'                 => 'required'
        ];

        $messages = [
            'nama.required'         => 'Nama wajib diisi',
            'alamat.required'       => 'Alamat wajib diisi',
            'nik.required'          => 'NIK wajib diisi',
            'nik.min'               => 'Minimal 16 karakter ',
            'no_hp.required'        => 'Nomor HP wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar'
        ];

        // $this->validate($request, $rules, $messages);

        $validator = FacadesValidator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        Nasabah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'foto' => 'profile.png',
            'nik' => $request->nik,
            'no_hp' => $request->no_hp
        ]);

        $id = DB::getPdo()->lastInsertId();

        User::create([
            'email' => strtolower($request->email),
            'password' => bcrypt('12345678'),
            'email_verified_at' =>  \Carbon\Carbon::now(),
            'level' => 'nasabah',
            'status' => '1',
            'id_nasabah' => $id,
            'remember_token' => Str::random(60)
        ]);

        return redirect('teller/data_nasabah')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function dataKoor()
    {
        $user = Auth::user();
        $koordinator = Koordinator::all();
        return view('teller.data_koor', compact('user', 'koordinator'));
    }

    public function dataSetoran()
    {
        $setoran = Setoran::all();
        $user = Auth::user();
        return view('teller.setoran', compact('user', 'setoran'));
    }

    // vieww
    public function addSetoran(Request $request)
    {
        $user       = Auth::user();
        $kode       = strtoupper(substr("SET", 0, 3));
        $check      = count(Setoran::where('id_setoran', 'like', "%$kode%")->get()->toArray());
        $angka      = sprintf("%03d", (int)$check + 1);
        $id_setoran = $kode . "" . $angka;

        $nasabah = Nasabah::all();
        $sampah  = Sampah::all();

        // foreach($request->nama as $key => $value)
        // {
        //     DetailSetoran::create([

        //     ]);
        // }
        return view('teller.setoran_add', compact('nasabah', 'sampah', 'id_setoran', 'user'));
    }

    //action
    public function addSetoran2(Request $request)
    {
        // dd($request);
        // $user = Auth::user();
        Setoran::create([
            'id_setoran'    => $request->id_setoran2,
            'id_nasabah'    => $request->nasabah,
            'total_harga'   => $request->total,
            'tanggal'       =>  $request->tanggal
        ]);

        // $jumlah_data = count($request->id_sampah);
        // for ($i = 0; $i < $jumlah_data; $i++) {
        //     DetailSetoran::create(
        //         [
        //             'id_setoran' => $request->id_setoran[$i],
        //             'id_sampah'  => $request->nama[$i],
        //             'jumlah' => $request->jumlah[$i],
        //             'harga' => $request->harga[$i],
        //             'subtotal' => $request->sub_total[$i]
        //         ]
        //     );
        // }
        foreach ($request->nama as $key => $value) {
            DetailSetoran::create(
                [
                    'id_setoran'   => $request->id_setoran[$key],
                    'id_sampah'    => $request->nama[$key],
                    'jumlah'       => $request->jumlah[$key],
                    'harga'        => $request->harga[$key],
                    'subtotal'     => $request->sub_total[$key]
                ]
            );
        }

        return redirect('teller/setoran_sampah')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function detailSetoran($id_setoran)
    {
        $user           = Auth::user();
        $data_setor     = Setoran::where('id_setoran', $id_setoran)->get();
        $detail_setor   = DetailSetoran::where('id_setoran', $id_setoran)->get();
        $total          = DetailSetoran::where('id_setoran', $id_setoran)->sum('subtotal');

        return view('teller.detailsetoran', compact('user', 'data_setor', 'detail_setor', 'total', 'id_setoran'));
    }
}
