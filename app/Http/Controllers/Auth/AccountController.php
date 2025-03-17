<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        return view('auth.account.account');
    }
    public function orders()
    {
        $orders = Auth::user()
            ->orders()
            ->with('items')
            ->latest()
            ->get();
        return view('auth.account.orders', compact('orders'));
    }
    public function details()
    {
        return view('auth.account.details');
    }
    public function addresses()
    {
        return view('auth.account.addresses');
    }
    public function wishlist()
    {
        $wishlistItems = Auth::user()
            ->wishlistItems()
            ->with('product')
            ->get();

        return view('auth.account.wishlist', compact('wishlistItems'));
    }
}
