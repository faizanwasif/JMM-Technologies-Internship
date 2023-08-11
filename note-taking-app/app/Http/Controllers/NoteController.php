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
}
