<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Order;
use App\Models\User;


class OrderController extends Controller
{
    public function index(){

        // get user
        // send user to placement page 
        
        $userInfo = Auth::user();
        return view('orders.placement', ['user' => $userInfo]);
    }

}
