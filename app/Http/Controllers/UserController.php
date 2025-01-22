<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function user()
    {
        $products = Product::paginate(12);

        return view('user', compact('products'));
    }
}
