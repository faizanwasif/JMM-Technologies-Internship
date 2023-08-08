<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Order;
use App\Models\User;
use App\Models\Product;


class OrderController extends Controller
{
    public function index(){

        // get user
        // send user to placement
        $userInfo = Auth::user();
        
        return view('orders.placement', ['user' => $userInfo]);
    }

    public function add(Product $product){

        dd($product->id);

        // return "THANK YOU!!";
    }

    public function calAmount(){
        
    }

}
