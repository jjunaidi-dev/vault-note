<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Register
    public function showRegister(){
        return view('admin.register');
    }

    public function Register(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);

        // Membuat data Admin baru dan menyimpannya ke Database
        $admin = Admin::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        // Langsung melakukan login menggunakan guard khusus admin setelah pendaftaran berhasil
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }

    // Show Form Login
    public function showLogin(){
        return view('admin.login');
    }

    // Login Prosses
    public function Login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //Jika autentikasi menggunakan guard admin berhasil mencocokkan kredensial yang diberikan, maka jalankan kode di dalam kurung kurawal
        if (Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('akun.index');
        }

        return back()->withErrors([
            'email'=>'Sorry Bro, kayanya lu salah email deh',
        ])->onlyInput('email');
    }

    // Logout
    public function Logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    

}
