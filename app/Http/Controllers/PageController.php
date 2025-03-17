<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // Import the Category model

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }

    public function navbarData()
    {
        $categories = Category::with('subcategories')->get();
        return view('partials.navbar', compact('categories'));
    }
}
