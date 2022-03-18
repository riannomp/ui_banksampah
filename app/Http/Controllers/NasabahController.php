<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasabahController extends Controller
{
    public function tabungan()
    {
        return view('nasabah.data_tabungan');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('nasabah.profie', compact('user'));
    }
}
