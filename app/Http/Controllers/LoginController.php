<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class LoginController extends Controller
{

    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect('dashboard');
        }
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = FacadesValidator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),

        ];


        $login = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1']);
        $login2 = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => '2']);

        $user = Auth::user();
        Auth::attempt($data);
        if ($login === TRUE) {
            return redirect()->route('dashboard');
        } else {
            if ($login2 === TRUE) {
                Auth::logout();
                FacadesSession::flash('error', 'Akun Belum AKTIF, silahkan hubungi Admin');
                return redirect()->route('login');
            } else {
                FacadesSession::flash('error', 'Email atau password salah');
                return redirect()->route('login');
            }
        }
        // if (Auth::attempt($request->only('email', 'password'))) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // } else {
        //     FacadesSession::flash('error', 'Email atau password salah');
        //     return redirect()->route('login');
        // }
    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {

        $rules = [
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = FacadesValidator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        Nasabah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        $id = DB::getPdo()->lastInsertId();

        // dd($id);
        $user = new User();
        $user->email = strtolower($request->email);
        $user->password = bcrypt($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->level = 'nasabah';
        $user->status = '2';
        $user->id_nasabah = $id;
        $user->remember_token = Str::random(60);
        $simpan = $user->save();

        if ($simpan) {
            FacadesSession::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            FacadesSession::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
