<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

//Models
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;


class OrderController extends Controller
{

   public function insert(Request $request, Order $order, Cart $cart){
      $totalAmount = request('totalAmount');
      $userId = Auth::id();
      $data = Order::create(array('user_id'=>$userId, 'total_amount'=>$totalAmount, 'order_date' => now()));

      $user = Auth::id();
      $products = Cart::where('user_id', $user)->delete();

      Session::flash('success', 'Order palced successfully!');

      return redirect()->route('products');

   }

}
