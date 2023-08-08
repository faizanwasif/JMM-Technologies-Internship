<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;


class CartController extends Controller
{
    public function showCart(){

        // Get all cart product IDs
        $cartProductIds = Cart::pluck('product_id')->toArray();

        // Get the products associated with the cart based on the join
        $items = Product::join('carts', 'products.id', '=', 'carts.product_id')
                        ->whereIn('products.id', $cartProductIds)
                        ->get();

        // Check if any products were found
        if ($items->isEmpty()) {
            // Handle the case when no products are associated with the cart
            return redirect()->route('home')->with('error', 'No items in cart.');
        }

        // Pass the products to the view
        return view('cart.show', ['items' => $items]);
    }

    public function add(Request $request){

        // dd("hello");
        $data = $request->validate([
            'user_id' =>'required',
            'product_id'=>'required',
        ]);


        $addData = Cart::create($data);

        return redirect()->route('cart.show');
    }
}
