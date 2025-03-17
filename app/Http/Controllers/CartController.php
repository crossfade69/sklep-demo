<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $cartItems = auth()->user()->cartItems()->with('product')->get();
            $cart = [];
            foreach ($cartItems as $item) {
                $cart[$item->product_id] = [
                    'name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'image' => $item->product->image
                ];
            }
        } else {
            $cart = session()->get('cart', []);
        }

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return view('cart', compact('cart', 'total'));
    }


    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Niewystarczająca ilość w magazynie']);
        }

        if (auth()->check()) {
            // Jeśli użytkownik jest zalogowany, zapisujemy do bazy danych
            $cartItem = CartItem::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {
                $cartItem->increment('quantity', $request->quantity);
            } else {
                CartItem::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'quantity' => $request->quantity
                ]);
            }
        } else {
            // Jeśli użytkownik nie jest zalogowany, zapisujemy do sesji
            $cart = session()->get('cart', []);
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] += $request->quantity;
            } else {
                $cart[$product->id] = [
                    'name' => $product->name,
                    'quantity' => $request->quantity,
                    'price' => $product->price,
                    'image' => $product->image
                ];
            }

            session()->put('cart', $cart);
            session()->save();
            dd(session('cart'));
        }

        return redirect()->back()->with('success', 'Produkt dodany do koszyka!');
    }

    public function remove($id)
    {
        if (auth()->check()) {
            CartItem::where('user_id', auth()->id())->where('product_id', $id)->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                session()->save();
            }
        }

        return back()->with('success', 'Produkt usunięty z koszyka.');
    }

    public function clear()
    {
        if (auth()->check()) {
            CartItem::where('user_id', auth()->id())->delete();
        } else {
            session()->forget('cart');
        }

        return back()->with('success', 'Koszyk został wyczyszczony.');
    }
}
