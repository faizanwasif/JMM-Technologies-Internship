<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        //Get Total amount
        //Get Units and Price for each individual product
        //Then add all the prices calculated
        $cal = Cart::select('carts.units', 'products.price')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->get();

        $totalPrice = $cal->sum('price');
        $totalUnits = $cal->sum('units');

        // Calculate the sum of the product of units and prices
        $totalAmount = $cal->sum(function ($item) {
            return $item->units * $item->price;
        });

        // Check if any products were found
        if ($items->isEmpty()) {
            // Handle the case when no products are associated with the cart
            Session::flash('empty-cart', 'The Cart is empty!'); 
            Session::flash('alert-class', 'alert-danger'); 
        }

        // Pass the products to the view
        return view('cart.show', ['items' => $items, 'totalAmount'=>$totalAmount]);
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

            //Add flash message to tell the item has been added successfully
            Session::flash('add-success', 'Item added successfully!'); 
            Session::flash('success-class', 'successfull'); 

            return redirect()->route('products');
        }
        
        // Cart does not exist, create a new entry in the carts table
        $addData = Cart::create($data);
        
        //Add flash message to tell the item has been added successfully
        Session::flash('add-success', 'Item added successfully!'); 
        Session::flash('success-class', 'successfull'); 

        return redirect()->route('products');
        
    }



    // data deletion
    public function del(Cart $product){

        $product->delete();

        return redirect()->route('cart.show');
    }
}
