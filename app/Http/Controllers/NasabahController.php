<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasabahController extends Controller
{
    public function tabungan()
    {
        $user = Auth::user();
        return view('nasabah.data_tabungan',compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('nasabah.profie', compact('user'));
    }
}
