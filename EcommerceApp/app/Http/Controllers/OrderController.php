<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;


class OrderController extends Controller
{

    public function calAmount(){

        $items = Cart::select('carts.units', 'products.price')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->get();

        $totalPrice = $items->sum('price');
        $totalUnits = $items->sum('units');

        $totalAmount = $totalAmount * $totalPrice;

        return view('cart.show');

    }

}
