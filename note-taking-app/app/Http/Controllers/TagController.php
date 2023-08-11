<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return view('pages.tags.view-tags', ['tags'=> $tags]);
    }
    public function create(){
        return view('pages.tags.add-tags');
    }

    public function add(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tag_id' => 'required'
        ]);

        Note::create($data);

        return redirect()->route('home');
    }
}
