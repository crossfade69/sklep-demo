<?php

namespace App\Http\Controllers;

use App\Models\Product; // Correct model import
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load('category');
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(6)
            ->get();

        return view('product.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    public function index()
    {
        $categories = Category::with('subcategories')->get();
        $productOfTheDay = Product::latestUpdated()->first();
        $latestProducts = Product::latest()->take(6)->get();        
        return view('home', compact('productOfTheDay', 'latestProducts', 'categories'));    
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
}
