<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function insert(Order $order, Cart $cart){

        $orderItem = Cart::where('user_id', '=', $order->user_id);

        dd($orderItem);

        $productInfo = OrderItem::create(array('order_id'=>$orderItem->order_id, 'product_id'->product_id));
        
    }
}
