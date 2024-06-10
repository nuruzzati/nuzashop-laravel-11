<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index() {
         $userId = Auth::id();
    
    // Mengambil semua produk yang ada dalam keranjang untuk pengguna saat ini
    $cartItems = Cart::where('user_id', $userId)->with('product')->get();
    
    // Mengirim data cartItems ke view cart.index
    return view('cart.index', compact('cartItems'));
    }











     public function addToCart(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('loginError', 'Kamu harus login untuk menambahkan produk ke keranjang.');
        }

        $product = Product::findOrFail($id);
        $userId = Auth::id();

        $cartItem = Cart::where('user_id', $userId)->where('product_id', $id)->first();

        if ($cartItem) {
            // Jika produk sudah ada di cart, tambahkan kuantitas
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Jika produk belum ada di cart, buat item baru
            Cart::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        return redirect('/product/detail/' . $id)->with('success', 'Product added to cart!');
    }
}
