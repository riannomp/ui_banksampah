<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dataSampah()
    {
        return view('admin.data_sampah');
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
        return view('admin.jenis');
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

