<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Tag;

class NoteController extends Controller
{
    public function create(){
        $tags = Tag::all();
        return view('pages.notes.add-note', ['tags'=> $tags]);
    }

    public function add(Request $request){
        // dd("heelo");
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tag_id' => 'required'
        ]);

        Note::create($data);

        return redirect()->route('home');
    }
}
