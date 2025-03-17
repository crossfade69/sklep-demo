<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        // Szukaj w głównych kategoriach
        $category = Category::where('slug', $slug)
            ->with(['subcategories'])
            ->first();

        if ($category) {
            $products = Product::whereHas('subcategory', function($query) use ($category) {
                $query->where('category_id', $category->id);
            })->paginate(10);

            return view('category', [
                'current_category' => $category,
                'current_subcategory' => null,
                'products' => $products,
                'categories' => Category::with('subcategories')->get()
            ]);
        }

        // Jeśli to podkategoria
        $subcategory = Subcategory::where('slug', $slug)
            ->with(['category', 'products'])
            ->firstOrFail();

        return view('category', [
            'current_category' => $subcategory->category,
            'current_subcategory' => $subcategory,
            'products' => $subcategory->products()->paginate(10),
            'categories' => Category::with('subcategories')->get()
        ]);
    }

}