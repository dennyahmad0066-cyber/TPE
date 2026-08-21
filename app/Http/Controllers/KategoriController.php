<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Tampilan Read Data
    public function index(Request $request)
    {
        $q = $request->get('q');
        $data['result'] = Kategori::where('nama_kategori', 'like', '%' . $q . '%')->paginate();
        
        // Memanggil file kategori-list.blade.php
        return view('kategori/list', $data);
    }

    // Tampilan Form Tambah
    public function create()
    {
        return view('kategori-form');
    }

    // Proses Simpan & Update
    public function store(Request $request, Kategori $kategori = null)
    {
        Kategori::updateOrCreate(['id' => @$kategori->id], $request->all());
        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan!');
    }

    // Tampilan Form Edit
    public function edit(Kategori $kategori)
    {
        return view('kategori-form', compact('kategori'));
    }

    // Proses Hapus Data
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return back()->with('success', 'Data kategori berhasil dihapus!');
    }
}