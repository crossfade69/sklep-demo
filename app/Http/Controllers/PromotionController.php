<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        // Logic to fetch promotions and pass them to the view
        return view('promotions.index'); // Ensure this view exists
    }
}