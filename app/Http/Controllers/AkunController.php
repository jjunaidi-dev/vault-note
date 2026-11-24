<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Istilah;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;

class AkunController extends Controller
{
    //tampilkan hanya akun milik admin yang login
    public function index()
    {
        $adminId = Auth::guard('admin')->id();

        $akuns = Akun::where('admin_id', $adminId)->latest()->get();
        $istilahs = Istilah::where('admin_id', $adminId)->latest()->get();
        $jadwal = Jadwal::where('admin_id', $adminId)->latest()->get();

        return view('welcome', compact('akuns', 'istilahs', 'jadwal'));
    }

    //fitur untuk input data
    public function store (Request $request){
        $request->validate([
            'nama_platform'=>'nullable|string|max:100',
            'username'=>'nullable|string|max:100',
            'email'=>'nullable|string|max:100',
            'password'=>'required|string',
        ]);

        Akun::create([
            'admin_id'=>Auth::guard('admin')->id(), //buat otomatis dari ID ketika dia login
            'nama_platform'=>$request->nama_platform,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }

    // fitur untuk hapus data
    public function destroy($id){
        $adminId = Auth::guard('admin')->id();

        // Pastikan yang dihapus benar-benar milik admin ini
        $akun = Akun::where('admin_id', $adminId)->findOrFail($id);
        $akun->delete();

        return back()->with('success', 'Data akun dihapus.');
    }
}
