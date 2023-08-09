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
            'user_id' => 'required',
            'product_id' => 'required',
        ]);
        
        // Check if the product already exists with the same user_id and product_id
        $existingCart = Cart::where('user_id', $data['user_id'])
                            ->where('product_id', $data['product_id'])
                            ->first();

        
        if ($existingCart) {
            // product already exists, handle the scenario (e.g., show an error message or redirect)
            $increment = Cart::find($existingCart->id);
            $increment->units ++;
            $increment->save();
            return redirect()->route('cart.show');
        }
        
        // Cart does not exist, create a new entry in the carts table
        $addData = Cart::create($data);
        
        return redirect()->route('cart.show');
        
    }

    public function update(Request $request){
        dd("EXITSSSS");
        $item = Cart::find('id');
        dd($item);
    }

    // data deletion
    public function del(Cart $cart){
        // we have to get citys and delete them too, 
        //and in the citys controller we would delete cities as well

        $cart->delete();

        return redirect()->route('cart.show');
    }
}
