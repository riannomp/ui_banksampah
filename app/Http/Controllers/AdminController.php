<?php

namespace App\Http\Controllers;

use App\Models\DetailSetoran;
use App\Models\Jenis;
use App\Models\Koordinator;
use App\Models\Nasabah;
use App\Models\Pegawai;
use App\Models\Sampah;
use App\Models\Setoran;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rules\Unique;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{
    public function dataSampah()
    {
        $user = Auth::user();
        $sampah = Sampah::all();
        $jenis = Jenis::all();
        return view('admin.data_sampah', compact('user', 'sampah', 'jenis'));
    }

    //view addsampah
    public function addSampahView()
    {
        $user = Auth::user();
        $jenis = Jenis::all();
        return view('admin.tambah_sampah', compact('user', 'jenis'));
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
                'nama'          => $request->nama,
                'keterangan'    => $request->keterangan,
                'id_sampah'     => $id_sampah,
                'id_jenis'      => $request->jenis,
                'jumlah'        => $request->jumlah,
                'gambar'        => $namaFile,
                'harga_nasabah' => $request->harga_nasabah,
                'harga_koordinator' => $request->harga_koordinator
            ]);
        } else {

            $kode = strtoupper(substr($request->nama, 0, 3));
            $check = count(Sampah::where('id_sampah', 'like', "%$kode%")->get()->toArray());
            $angka = sprintf("%03d", (int)$check + 1);
            $id_sampah = $kode . "" . $angka;

            Sampah::create([
                'nama'          => $request->nama,
                'keterangan'    => $request->keterangan,
                'id_sampah'     => $id_sampah,
                'gambar'        => 'no_image.png',
                'id_jenis'      => $request->jenis,
                'jumlah'        => $request->jumlah,
                'harga_nasabah' => $request->harga_nasabah,
                'harga_koordinator' => $request->harga_koordinator
            ]);
        }
        Alert::success('Success', 'Data Berhasil Ditambahkan');
        return redirect('admin/data_sampah');
    }

    public function updateSampah(Request $request)
    {
        if ($request->edit_gambar) {
            $namaFile = time() . '.' . $request->edit_gambar->extension();
            $request->edit_gambar->move(public_path('img/logo'), $namaFile);
            Sampah::where('id_sampah', $request->edit_id)
                ->update([

                    'nama'              => $request->edit_nama,
                    'keterangan'        => $request->edit_keterangan,
                    'gambar'            => $namaFile,
                    'harga_nasabah'     => $request->edit_harga_nasabah,
                    'harga_koordinator' => $request->edit_harga_koordinator
                ]);
        } else {

            Sampah::where('id_sampah', $request->edit_id)
                ->update([
                    'nama'              => $request->edit_nama,
                    'keterangan'        => $request->edit_keterangan,
                    'harga_nasabah'     => $request->edit_harga_nasabah,
                    'harga_koordinator' => $request->edit_harga_koordinator
                ]);
        }
        return redirect()->back();
    }
    public function deleteSampah($id)
    {
        DB::table('sampahs')->where('id_sampah', $id)->delete();
        return redirect()->back();
    }
    public function dataNasabah()
    {
        $user = Auth::user();
        $nasabah = Nasabah::all();
        return view('admin.data_nasabah', compact('nasabah', 'user'));
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
        Alert::success('Success', 'Berhasil Menambahkan Nasabah');
        return redirect('admin/data_nasabah');
    }
    public function updateNasabah(Request $request)
    {
        Nasabah::where('id_nasabah', $request->edit_id)
            ->update([
                'nama'      => $request->edit_nama,
                'alamat'    => $request->edit_alamat,
                'nik'       => $request->edit_nik,
                'no_hp'     => $request->edit_no_hp
            ]);
        Alert::success('Success', 'Berhasil Mengubah Data Nasabah');
        return redirect()->back();
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
            'email'             => strtolower($request->email),
            'password'          => bcrypt('12345678'),
            'email_verified_at' =>  \Carbon\Carbon::now(),
            'level'             => $request->level,
            'status'            => '1',
            'id_pegawai'        => $id,
            'remember_token'    => Str::random(60)
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
        Alert::success('Success', 'Berhasil Menambah Data Pegawai');
        return redirect('admin/data_pegawai');
    }
    public function updatePegawai(Request $request)
    {
        Pegawai::where('id_pegawai', $request->edit_id)
            ->update([
                'nama'      => $request->edit_nama,
                'alamat'    => $request->edit_alamat,
                'no_hp'     => $request->edit_no_hp
            ]);
        Alert::success('Success', 'Berhasil Mengubah Data Pegawai');
        return redirect()->back();
    }

    public function deletePegawai($id)
    {
        DB::table('pegawais')->where('id_pegawai', $id)->delete();
        return redirect('admin/data_pegawai');
    }
    public function dataKoor()
    {
        $user        = Auth::user();
        $koordinator = Koordinator::all();
        return view('admin/data_koor', compact('user', 'koordinator'));
    }

    public function addKoor()
    {
        $user = Auth::user();
        return view('admin.tambah_koor', compact('user'));
    }
    public function addKoor2(Request $request)
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
        Koordinator::create([
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'foto'      => 'profile.png',
            'no_hp'     => $request->no_hp
        ]);

        $id = DB::getPdo()->lastInsertId();

        User::create([
            'email' => strtolower($request->email),
            'password' => bcrypt('12345678'),
            'email_verified_at' =>  \Carbon\Carbon::now(),
            'level' => 'koor',
            'status' => '1',
            'id_koor' => $id,
            'remember_token' => Str::random(60)
        ]);
        // dd($request);
        Alert::success('Success', 'Berhasil Menambahkan Koordinator');
        return redirect('admin/data_koordinator');
    }

    public function updateKoor(Request $request)
    {
        Koordinator::where('id_koor', $request->edit_id)
            ->update([
                'nama'      => $request->edit_nama,
                'alamat'    => $request->edit_alamat,
                'no_hp'     => $request->edit_no_hp
            ]);
        Alert::success('Success', 'Berhasil Mengubah Data Koor');
        return redirect()->back();
    }

    public function searchBydate(Request $request)
    {
        $user       = Auth::user();
        $setoran = Setoran::where('tanggal', '>=', $request->start)->where('tanggal', '<=', $request->end)->get();
        // dd($request->peminjaman);
        return view('admin.setoran', compact('setoran', 'user'));
    }

    public function dataSetoran()
    {
        $user       = Auth::user();
        $setoran    = Setoran::all();
        return view('admin.setoran', compact('user', 'setoran'));
    }
    public function detailSetoran($id_setoran)
    {
        $user           = Auth::user();
        $data_setor     = Setoran::where('id_setoran', $id_setoran)->get();
        $detail_setor   = DetailSetoran::where('id_setoran', $id_setoran)->get();
        $total          = DetailSetoran::where('id_setoran', $id_setoran)->sum('subtotal');

        return view('admin.detailsetoran', compact('user', 'data_setor', 'detail_setor', 'total', 'id_setoran'));
    }

    public function penarikan()
    {
        $user       = Auth::user();
        $penarikan = Transaksi::all();

        return view('admin.penarikan', compact('penarikan', 'user'));
    }
    public function addSetor()
    {
        $user = Auth::user();
        return view('admin.setoran_add', compact('user'));
    }

    public function dataJenis()
    {
        $user = Auth::user();
        $jenis = Jenis::all();
        return view('admin.jenis', compact('jenis', 'user'));
    }

    public function addJenis(Request $request)
    {
        $kode = strtoupper(substr("JNS", 0, 3));
        $check = count(Jenis::where('id_jenis', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $id_jenis = $kode . "" . $angka;

        Jenis::create([
            'id_jenis'  => $id_jenis,
            'nama'      => $request->nama
        ]);
        return redirect()->back();
    }

    public function updateJenis(Request $request)
    {
        // dd($request);
        Jenis::where('id_jenis', $request->edit_id)
            ->update([
                'nama' => $request->edit_nama
            ]);
        return redirect()->back();
    }

    public function deleteJenis($id)
    {
        DB::table('jenis')->where('id_jenis', $id)->delete();
        return redirect()->back();
    }



    public function dataUser()
    {
        $user = Auth::user();
        $usr = User::all();
        return view('admin.data_user', compact('user', 'usr'));
    }
    public function updateStatus(Request $request)
    {
        User::where('id_user', $request->edit_id)
            ->update([
                'status'    => $request->edit_status
            ]);
        Alert::success('Success', 'Status Berhasil di Ubah');
        return redirect('admin/data_user');
    }

    public function resetPassword(Request $request)
    {
        // dd($request);
        User::where('id_user', $request->edit_id)
            ->update([
                'password' =>  bcrypt('12345678')
            ]);
        Alert::success('Success', 'Password Berhasil di Reset');
        return redirect('admin/data_user');
    }
}
