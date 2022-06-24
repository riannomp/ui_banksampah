<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\Setoran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $nasabah = Nasabah::count();
        $sampah = Sampah::count();
        $transaksi = Setoran::count();
        return view('dashboard', compact('user', 'nasabah','users','sampah', 'transaksi'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}
