<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorld extends Controller
{
    //
    public function helloworld(){
        return view('welcome');
    }
}
