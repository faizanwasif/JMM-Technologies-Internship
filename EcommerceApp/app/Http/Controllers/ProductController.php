<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        $product = Product::all();

        $userId = Auth::id();


        return view('products.catalogue',
        [
            'product' => $product,
            'user_id' => $userId
        ]);
    }

    public function show(Product $product){
        return view('products.show', ['product' => $product]);
    }
}
