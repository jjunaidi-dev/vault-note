<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Istilah;


class IstilahController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'nama_istilah' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'arti' => 'required|string',
        ]);

        Istilah::create([
            'admin_id'     => Auth::guard('admin')->id(),
            'nama_istilah' => $validated['nama_istilah'],
            'kategori'     => $validated['kategori'],
            'arti'         => $validated['arti'],
        ]);

        return redirect()->back()->with('success', 'Istilah berhasil ditambahkan.');
    }

    // Mengupdate istilah yang sudah ada
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_istilah' => 'required|string|max:255',
            'kategori'     => 'required|string|max:100',
            'arti'         => 'required|string',
        ]);

        // Pastikan data ada dan memang milik admin yang sedang login
        $istilah = Istilah::where('id', $id)
            ->where('admin_id', Auth::guard('admin')->id())
            ->firstOrFail();

        $istilah->update($validated);

        return redirect()->back()->with('success', 'Istilah berhasil diperbarui.');
    }

    // Menghapus istilah (bonus biar CRUD lengkap)
    public function destroy($id)
    {
        $istilah = Istilah::where('id', $id)
            ->where('admin_id', Auth::guard('admin')->id())
            ->firstOrFail();

        $istilah->delete();

        return redirect()->back()->with('success', 'Istilah berhasil dihapus.');
    }
}
