<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Fungsi untuk nampilin form
    public function create()
    {
        // Pastikan nama folder dan file view-nya bener ya (resources/views/produk/form.blade.php)
        return view('produk.form'); 
    }

    // Fungsi untuk memproses data
    public function store(Request $request)
    {
        // Satpam form kita siap beraksi!
        $rules = [
            // Wajib diisi, harus ada di pilihan
            'kategori_produk' => 'required|in:Sepatu,Baju',

            // Wajib diisi, tipe teks, maksimal 255 karakter
            'nama_produk' => 'required|string|max:255',

            // Wajib diisi, harus angka bulat
            'stok' => 'required|integer|min:1',

            // Wajib diisi, harus angka, minimal 1000 perak, maksimal 1 milyar
            'harga_produk' => 'required|numeric|min:1000|max:1000000000',
        ];

        // Proses eksekusi validasi
        $validatedData = $request->validate($rules);

        // Kalau lolos, lempar ke halaman show
        return view('produk.show', ['data' => $validatedData]);
    }
}