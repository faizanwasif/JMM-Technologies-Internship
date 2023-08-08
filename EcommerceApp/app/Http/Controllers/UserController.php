<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class UserController extends Controller
{
    public function store(Product $product)
    {
        $products = array($product);
        dd($products);
        return view('users.view');
    }
}
