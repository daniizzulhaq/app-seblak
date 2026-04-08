<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Eager load relasi produk dan levelPedas
        $carts = Cart::with('produk.levelPedas', 'produk.kategori')
            ->where('user_id', auth()->id())
            ->get();

        $total = $carts->sum(fn($cart) => $cart->getSubtotal());

        return view('cart.index', compact('carts', 'total'));
    }

    public function add(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if ($produk->stok < $validated['quantity']) {
            return redirect()->back()
                ->with('error', 'Stok tidak mencukupi');
        }

        $cart = Cart::where('user_id', auth()->id())
            ->where('produk_id', $produk->id)
            ->first();

        if ($cart) {
            $newQuantity = $cart->quantity + $validated['quantity'];

            if ($produk->stok < $newQuantity) {
                return redirect()->back()
                    ->with('error', 'Stok tidak mencukupi');
            }

            $cart->update(['quantity' => $newQuantity]);
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'produk_id' => $produk->id,
                'quantity' => $validated['quantity'],
            ]);
        }

        return redirect()->back()
            ->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function update(Request $request, Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) abort(403);

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if ($cart->produk->stok < $validated['quantity']) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi');
        }

        $cart->update($validated);

        return redirect()->back()->with('success', 'Keranjang berhasil diupdate');
    }

    public function destroy(Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) abort(403);

        $cart->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }
}