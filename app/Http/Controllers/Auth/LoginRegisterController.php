<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'beranda'
        ]);
    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $req){
        $req->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        $credentials = $req->only('email,password');
        Auth::attempt($credentials);
        $req->session()->regenerate();

        return redirect()->route('beranda')->withSuccess('Kamu Berhasil Registrasi');

    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $req){
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            $user = Auth::user();

            $req->session()->put('user_id',$user->id);

            return redirect()->route('beranda')->withSuccess('Kamu berhasil Loggin');
        }

        return back()->withErrors([
            "email" => "Akun tidak Ditemukan!",
            "password" => "Ada kesalahan dalam password ulangi!",
        ])->onlyInput();

    }

    public function beranda()
    {
        if(Auth::check())
        {
            return view('pages.beranda.index');
        }

        return redirect()->route('login')
            ->withErrors([
            'email' => 'Login terlebih dahulu sebelum ke beranda',
        ])->onlyInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('Selamat Kamu Berhasil Log Out');;
    }


}
