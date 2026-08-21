<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        // Pencarian menggunakan 'nama_lengkap'
        $data['result'] = Pelanggan::where('nama_lengkap', 'like', '%' . $q . '%')->paginate();
        return view('pelanggan.list', $data);
    }

    public function create()
    {
        return view('pelanggan.form');
    }

    public function store(Request $request, Pelanggan $pelanggan = null)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/pelanggan');
            $data['foto'] = basename($path); 
        }

        Pelanggan::updateOrCreate(['id' => @$pelanggan->id], $data);
        return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil disimpan!');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.form', compact('pelanggan'));
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return back()->with('success', 'Data pelanggan berhasil dihapus!');
    }
}