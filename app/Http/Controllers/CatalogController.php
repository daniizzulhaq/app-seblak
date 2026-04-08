<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\LevelPedas;
use App\Models\Kategori;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with(['levelPedas', 'kategori']);

        // Filter by search
        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // Filter by level pedas
        if ($request->filled('level_pedas_id')) {
            $query->where('level_pedas_id', $request->level_pedas_id);
        }

        // Filter by kategori
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // Sort
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('harga', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('harga', 'desc');
                break;
            case 'name':
                $query->orderBy('nama_produk', 'asc');
                break;
            default:
                $query->latest();
        }

        $produks    = $query->paginate(12)->withQueryString();
        $levelPedas = LevelPedas::all();
        $kategoris  = Kategori::all();

        return view('catalog.index', compact('produks', 'levelPedas', 'kategoris'));
    }

    public function show(Produk $produk)
    {
        $produk->load(['levelPedas', 'kategori']);

        $relatedProducts = Produk::where('kategori_id', $produk->kategori_id)
            ->where('id', '!=', $produk->id)
            ->take(4)
            ->get();

        return view('catalog.show', compact('produk', 'relatedProducts'));
    }
}