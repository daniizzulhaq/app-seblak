<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\LevelPedas;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with(['kategori', 'levelPedas'])->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris  = Kategori::all();
        $levelPedas = LevelPedas::all();
        return view('admin.produk.create', compact('kategoris', 'levelPedas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk'    => 'required|string|max:255',
            'kategori_id'    => 'required|exists:kategoris,id',
            'level_pedas_id' => 'required|exists:level_pedas,id',
            'deskripsi'      => 'required|string',
            'harga'          => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            $namaFile = time() . '.' . $file->extension();

            // simpan langsung ke public_html/storage/produk
            $file->move(public_path('storage/produk'), $namaFile);

            $validatedData['gambar'] = 'produk/' . $namaFile;
        }

        Produk::create($validatedData);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk seblak berhasil ditambahkan! 🌶️');
    }

    public function edit($id)
    {
        $produk     = Produk::findOrFail($id);
        $kategoris  = Kategori::all();
        $levelPedas = LevelPedas::all();
        return view('admin.produk.edit', compact('produk', 'kategoris', 'levelPedas'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validatedData = $request->validate([
            'nama_produk'    => 'required|string|max:255',
            'kategori_id'    => 'required|exists:kategoris,id',
            'level_pedas_id' => 'required|exists:level_pedas,id',
            'deskripsi'      => 'required|string',
            'harga'          => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {

            // hapus gambar lama jika ada
            if ($produk->gambar && file_exists(public_path('storage/' . $produk->gambar))) {
                unlink(public_path('storage/' . $produk->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time() . '.' . $file->extension();

            $file->move(public_path('storage/produk'), $namaFile);

            $validatedData['gambar'] = 'produk/' . $namaFile;
        }

        $produk->update($validatedData);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk seblak berhasil diupdate!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && file_exists(public_path('storage/' . $produk->gambar))) {
            unlink(public_path('storage/' . $produk->gambar));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk seblak berhasil dihapus!');
    }
}