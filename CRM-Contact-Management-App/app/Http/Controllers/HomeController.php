<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showList()
    {
        $contacts = auth()->user()->contacts()->orderBy('name', 'asc')->paginate(10);

        session(['list' => true]); // Set the session variable 'list'

        return view('home', compact('contacts'));
    }

    public function showTag()
    {
        $tags = auth()->user()->tags()->orderBy('name', 'asc')->paginate(10);

        session(['tag' => true]);
        
        return view('pages.tag.view', compact('tags'));
    }

}
