<?php

namespace App\Http\Controllers;

use App\Models\DetailSetoran;
use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\Setoran;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use RealRashid\SweetAlert\Facades\Alert;

class KoordinatorController extends Controller
{
    public function dataSetoran()
    {
        $user = Auth::user();
        $setoran = Setoran::all();
        return view('koor.setoran', compact('user', 'setoran'));
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

        return view('koor.setoran_add', compact('nasabah', 'sampah', 'id_setoran', 'user'));
    }
    public function addSetoran2(Request $request)
    {
        dd($request);
        $user = Auth::user();
        Setoran::create([
            'id_setoran'    => $request->id_setoran2,
            'id_nasabah'    => $request->nasabah,
            'total_harga'   => $request->total,
            'tanggal'       =>  $request->tanggal,
            'id_koor'       =>  $user->id_koor
        ]);

        $total = Nasabah::total($request->nasabah);

        $nasabah = Nasabah::find($request->nasabah);
        $nasabah->saldo = $total;
        $nasabah->save();

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
        Transaksi::create([
            'id_nasabah' => $request->nasabah,
            'setoran' => $request->total,
        ]);
        // $saldo = Transaksi::saldo($request->nasabah);

        // $nasabah = Transaksi::find($request->nasabah);
        // $nasabah->saldo = $saldo;
        // $nasabah->save();


        Alert::success('Success', 'Setoran Berhasil Ditambahkan');
        return redirect('koor/setoran_sampah');
    }

    public function detailSetoran($id_setoran)
    {
        $user           = Auth::user();
        $data_setor     = Setoran::where('id_setoran', $id_setoran)->get();
        $detail_setor   = DetailSetoran::where('id_setoran', $id_setoran)->get();
        $total          = DetailSetoran::where('id_setoran', $id_setoran)->sum('subtotal');

        return view('koor.detail_setoran', compact('user', 'data_setor', 'detail_setor', 'total', 'id_setoran'));
    }

    public function penarikan()
    {
        $user           = Auth::user();
        $nasabah        = Nasabah::all();

        return view('koor.penarikan', compact('nasabah', 'user'));
    }

    public function addPenarikan()
    {
    }


    public function dataNasabah()
    {
        $user = Auth::user();
        $nasabah = Nasabah::all();
        return view('koor.data_nasabah', compact('nasabah', 'user'));
    }

    public function addNasabah()
    {
        $user = Auth::user();
        return view('koor.tambah_nasabah', compact('user'));
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

        return redirect('koor/data_nasabah')->with(['success' => 'Data berhasil ditambahkan']);
    }
}
