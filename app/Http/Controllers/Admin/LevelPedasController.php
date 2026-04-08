<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LevelPedas;
use Illuminate\Http\Request;

class LevelPedasController extends Controller
{
    public function index()
    {
        $levelPedas = LevelPedas::withCount('produks')->paginate(10);
        return view('admin.level-pedas.index', compact('levelPedas'));
    }

    public function create()
    {
        return view('admin.level-pedas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_level' => 'required|string|max:255|unique:level_pedas,nama_level',
        ]);

        LevelPedas::create($request->only('nama_level'));

        return redirect()->route('admin.level-pedas.index')
                         ->with('success', 'Level pedas berhasil ditambahkan! 🌶️');
    }

    public function show($id)
    {
        $levelPedas = LevelPedas::withCount('produks')->findOrFail($id);
        $produks    = $levelPedas->produks()->paginate(10);
        return view('admin.level-pedas.show', compact('levelPedas', 'produks'));
    }

    public function edit($id)
    {
        $levelPedas = LevelPedas::findOrFail($id);
        return view('admin.level-pedas.edit', compact('levelPedas'));
    }

    public function update(Request $request, $id)
    {
        $levelPedas = LevelPedas::findOrFail($id);

        $request->validate([
            'nama_level' => 'required|string|max:255|unique:level_pedas,nama_level,' . $id,
        ]);

        $levelPedas->update($request->only('nama_level'));

        return redirect()->route('admin.level-pedas.index')
                         ->with('success', 'Level pedas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $levelPedas = LevelPedas::findOrFail($id);

        // Cegah hapus jika masih dipakai produk
        if ($levelPedas->produks()->count() > 0) {
            return redirect()->route('admin.level-pedas.index')
                             ->with('error', 'Level pedas tidak bisa dihapus karena masih digunakan oleh ' . $levelPedas->produks()->count() . ' produk!');
        }

        $levelPedas->delete();

        return redirect()->route('admin.level-pedas.index')
                         ->with('success', 'Level pedas berhasil dihapus!');
    }
}