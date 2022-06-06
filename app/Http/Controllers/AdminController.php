<?php

namespace App\Http\Controllers;

use App\Models\DetailSetoran;
use App\Models\Jenis;
use App\Models\Nasabah;
use App\Models\Pegawai;
use App\Models\Sampah;
use App\Models\Setoran;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rules\Unique;

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
    public function addNasabah()
    {
        $user = Auth::user();
        return view('admin.tambah_nasabah', compact('user'));
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

        return redirect('admin/data_nasabah')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function dataPegawai()
    {
        $user = Auth::user();
        $pegawai = Pegawai::all();

        return view('admin.data_pegawai', compact('user', 'pegawai'));
    }

    public function addPegawai()
    {
        $user = Auth::user();
        return view('admin.tambah_pegawai', compact('user'));
    }

    public function addPegawai2(Request $request)
    {
        $rules = [
            'nama'                  => 'required',
            'alamat'                => 'required',
            'email'                 => 'required|email|unique:users,email',
            'no_hp'                 => 'required'
        ];

        $messages = [
            'nama.required'         => 'Nama Lengkap wajib diisi',
            'alamat.required'       => 'Alamat wajib diisi',
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
        Pegawai::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'foto' => 'profile.png',
            'no_hp' => $request->no_hp
        ]);

        $id = DB::getPdo()->lastInsertId();

        User::create([
            'email' => strtolower($request->email),
            'password' => bcrypt('12345678'),
            'email_verified_at' =>  \Carbon\Carbon::now(),
            'level' => $request->level,
            'status' => '1',
            'id_pegawai' => $id,
            'remember_token' => Str::random(60)
        ]);

        // $user = new User();
        // $user->email = strtolower($request->email);
        // $user->password = bcrypt('12345678');
        // $user->email_verified_at = \Carbon\Carbon::now();
        // $user->level = $request->level;
        // $user->status = '1';
        // $user->id_pegawai= $id;
        // $user->remember_token = Str::random(60);
       // $simpan = $user->save();
        // dd($request);
        return redirect('admin/data_pegawai')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function dataSetoran()
    {
        $user = Auth::user();
        $setoran = Setoran::all();
        return view('admin.setoran', compact('user', 'setoran'));
    }
    public function detailSetoran($id_setoran)
    {
        $user = Auth::user();
        $data_setor = Setoran::where('id_setoran', $id_setoran)->get();
        $detail_setor = DetailSetoran::where('id_setoran', $id_setoran)->get();
        $total = DetailSetoran::where('id_setoran', $id_setoran)->sum('subtotal');

        return view('admin.detailsetoran',compact('user','data_setor','detail_setor','total', 'id_setoran'));
    }
    public function addSetor()
    {
        $user = Auth::user();
        return view('admin.setoran_add',compact('user'));
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

