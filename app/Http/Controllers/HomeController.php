<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $productOfTheDay = Product::latestUpdated()->first();
        $products = Product::latest()->take(6)->get();
        $categories = Category::with('subcategories')->whereNull('parent_id')->get();

        return view('home', compact('productOfTheDay', 'products', 'categories'));
    }
}
