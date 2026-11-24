<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    //Input data Jadwal
    public function store(Request $request){
        $validated = $request->validate([
            'judul_kegiatan' => ['required', 'string', 'max:255'],
            'tanggal'        => ['required', 'date'],
            'waktu'          => ['required', 'string', 'max:50'],
            'location'       => ['required', 'string', 'max:255'],
        ]);

        Jadwal::create([
            'admin_id'       => Auth::guard('admin')->id() ?? Auth::id(),
            'judul_kegiatan' => $validated['judul_kegiatan'],
            'tanggal'        => $validated['tanggal'],
            'waktu'          => $validated['waktu'],
            'location'       => $validated['location'],
        ]);

        return back()->with('success', 'Jadwal berhasil ditambahkan');
    }

    //Fitur buat Hapus data
    public function destroy($id){
        $jadwal = Jadwal::where('id', $id)->where('admin_id', Auth::guard('admin')->id())->firstOrFail();

        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
    }
}
