<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishlistItem;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add(Product $product)
    {
        $user = auth()->user();
        
        // Sprawdź czy produkt już istnieje w wishliście
        $existingItem = $user->wishlistItems()
            ->where('product_id', $product->id)
            ->first();

        if (!$existingItem) {
            WishlistItem::create([
                'user_id' => $user->id,
                'product_id' => $product->id
            ]);
            
            return back()->with('success', 'Produkt dodany do listy życzeń');
        }

        return back()->with('info', 'Produkt jest już na liście życzeń');
    }

    public function remove($id)
    {
        $user = auth()->user();

        $wishlistItem = $user->wishlistItems()->where('id', $id)->first();
        
        if ($wishlistItem) {
            $wishlistItem->delete();
            return back()->with('success', 'Produkt usunięty z listy życzeń.');
        }

        return back()->with('error', 'Produkt nie istnieje na liście życzeń.');
    }
}