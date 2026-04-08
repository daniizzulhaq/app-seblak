<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\LevelPedas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $validatedData['gambar'] = $request->file('gambar')->store('produk', 'public');
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
            // Hapus gambar lama jika ada
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($validatedData);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk seblak berhasil diupdate!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk seblak berhasil dihapus!');
    }
}