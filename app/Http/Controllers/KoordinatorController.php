<?php

namespace App\Http\Controllers;

use App\Models\DetailSetoran;
use App\Models\Jenis;
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
        $setoran = Setoran::all()->where('status', '', '1')->where('id_koor', '', $user->id_koor);
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
        // dd(str_replace(',', '',  $request->total));
        $user = Auth::user();
        Setoran::create([
            'id_setoran'    => $request->id_setoran2,
            'id_nasabah'    => $request->nasabah,
            'total_harga'   => str_replace(',', '',  $request->total),
            'tanggal'       =>  $request->tanggal,
            'status'        => '1',
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
                    'harga'        => str_replace(',', '',  $request->harga[$key]),
                    'subtotal'     => str_replace(',', '',  $request->sub_total[$key])
                ]
            );
        }

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

    // public function kode(Request $request){
    //     // dd($request);
    //     $select = $request->get('select');
    //     $values = $request->get('value');
    //     $dependent = $request->get('dependent');

    //     //    dd($dependent);
    //     $data = DB::table('sampahs')->where('id_sampah', $values)->get();

    //     foreach ($data as $row) {
    //         $output = '<option value="'.$row->id_sampah.'">'.$row->id_sampah.'</option>';
    //     }
    //     echo $output;
    // }

    public function dataSampah()
    {
        $user = Auth::user();
        $sampah = Sampah::all();
        $jenis = Jenis::all();
        return view('koor.data_sampah', compact('user', 'sampah', 'jenis'));
    }

    public function penarikan()
    {
        $user           = Auth::user();
        $nasabah        = Nasabah::all();

        return view('koor.penarikan', compact('nasabah', 'user'));
    }

    public function addPenarikan(Request $request)
    {

        $user       = Auth::user();


        Transaksi::create([
            'id_nasabah'=> $request->edit_id,
            'id_koor'   =>  $user->id_koor,
            'penarikan' =>  str_replace(',', '',  $request->penarikan),
            'status'    => '1'
        ]);


        $saldo = Nasabah::tarik($request->edit_id, $request->penarikan);
        $nasabah = Nasabah::find($request->edit_id);
        $nasabah->saldo = $saldo;
        $nasabah->save();

        Alert::success('Success', 'Berhasil Menambahkan Penarikan');
        return redirect()->back();
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
            'nik'                   => 'required|min:16|max:16',
            'email'                 => 'required|email|unique:users,email',
            'no_hp'                 => 'required'
        ];

        $messages = [
            'nama.required'         => 'Nama wajib diisi',
            'alamat.required'       => 'Alamat wajib diisi',
            'nik.required'          => 'NIK wajib diisi',
            'nik.min'               => 'Minimal 16 karakter ',
            'nik.max'               => 'Maksimal 16 karakter ',
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
        Alert::success('Success', 'Berhasil Menambahkan Nasabah');
        return redirect('koor/data_nasabah');
    }
    public function updateNasabah(Request $request)
    {
        Nasabah::where('id_nasabah', $request->edit_id)
            ->update([
                'nama' => $request->edit_nama,
                'nik' => $request->edit_nik,
                'alamat' => $request->edit_alamat,
                'no_hp' => $request->edit_no_hp,
            ]);
        Alert::success('Success', 'Berhasil Mengubah Data Nasabah');
        return redirect()->back();
    }

    public function riwayatSetor()
    {
        $user = Auth::user();
        $setoran = Setoran::all()->where('status', '', '2')->where('id_koor', '', $user->id_koor);

        return view('koor.riwayat_setoran', compact('user', 'setoran'));
    }

    public function riwayatPenarikan()
    {
        $user = Auth::user();
        $penarikan = Transaksi::all()->where('status', '', '2')->where('id_koor', '', $user->id_koor);
        return view('koor.riwayat_penarikan', compact('user', 'penarikan'));
    }
}
