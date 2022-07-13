<?php

namespace App\Http\Controllers;

use App\Models\Koordinator;
use App\Models\Nasabah;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    // admin
    public function updatePegawai(Request $request)
    {
        if ($request->edit_foto) {
            $namaFile = time() . '.' . $request->edit_foto->extension();
            $request->edit_foto->move(public_path('img/logo'), $namaFile);
            Pegawai::where('id_pegawai', $request->edit_id)
                ->update([
                    'nama'              => $request->edit_nama,
                    'foto'              => $namaFile,
                    'no_hp'              => $request->edit_no_hp,
                    'alamat'            => $request->edit_alamat
                ]);
        } else {

            Pegawai::where('id_pegawai', $request->edit_id)
                ->update([
                    'nama'              => $request->edit_nama,
                    'no_hp'              => $request->edit_no_hp,
                    'alamat'            => $request->edit_alamat
                ]);
        }
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect('dashboard');
    }



    public function updateKoor(Request $request)
    {
        if ($request->edit_foto) {
            $namaFile = time() . '.' . $request->edit_foto->extension();
            $request->edit_foto->move(public_path('img/logo'), $namaFile);
            Koordinator::where('id_koor', $request->edit_id)
                ->update([
                    'nama'              => $request->edit_nama,
                    'foto'              => $namaFile,
                    'no_hp'              => $request->edit_no_hp,
                    'alamat'            => $request->edit_alamat
                ]);
        } else {

            Koordinator::where('id_koor', $request->edit_id)
                ->update([
                    'nama'              => $request->edit_nama,
                    'no_hp'              => $request->edit_no_hp,
                    'alamat'            => $request->edit_alamat
                ]);
        }
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect('dashboard');
    }
    public function updateNasabah(Request $request)
    {

        if ($request->edit_foto) {
            $namaFile = time() . '.' . $request->edit_foto->extension();
            $request->edit_foto->move(public_path('img/logo'), $namaFile);
            Nasabah::where('id_nasabah', $request->edit_id)
                ->update([
                    'nama'              => $request->edit_nama,
                    'foto'              => $namaFile,
                    'no_hp'              => $request->edit_no_hp,
                    'alamat'            => $request->edit_alamat
                ]);
        } else {

            Nasabah::where('id_nasabah', $request->edit_id)
                ->update([
                    'nama'              => $request->edit_nama,
                    'no_hp'             => $request->edit_no_hp,
                    'alamat'            => $request->edit_alamat
                ]);
        }
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect('dashboard');
    }

    public function updateAuth(Request $request)
    {

        $user = User::find($request->edit_id);
        $user->email    = $request->edit_email;
        $user->password = bcrypt($request->edit_password);
        $user->save();

        // if($simpan){
        //     Alert::success('Success', 'Data Berhasil Diubah');
        //     return redirect('profile');
        // } else {
        //     Alert::error('Error', 'Data Gagal Diubah');
        //     return redirect('profile');
        // }
        // if ($request->edit_email and $request->edit_password) {

        //     // User::where('id_user', $request->edit_id)
        //     //     ->update([
        //     //         'email'     => $request->edit_email,
        //     //         'password'  => bcrypt($request->edit_password)
        //     //     ]);
        // } else {
        //     User::where('id_user', $request->edit_id)
        //         ->update([
        //             'password'  => $request->password
        //         ]);
        // }
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect('dashboard');
    }
}
