<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){

        // return view('pages.orders.show');

        $orderInfo = request('orderInfo');

        dd($orderInfo);

        // return view('pages.orders.show', [
        //     'orderInfo' => $orderInfo
        // ]);
    }

    public function show(Product $product){

        //$order = Order::where('id', '=', request('order'));

        dd($product);

        return view(
            'pages.orders.show', 
            ['order'=>$order]
    );}

}
