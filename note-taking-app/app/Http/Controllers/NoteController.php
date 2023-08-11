<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Tag;

class NoteController extends Controller
{
    
    public function index(){
        $info = request('note');

        $note = Note::where('id', '=', $info)->first();
    
        return view('pages.notes.view', ['note'=>$note]);

    }


    public function create(){
        $tags = Tag::all();
        return view('pages.notes.add-note', ['tags'=> $tags]);
    }

    public function add(Request $request){
        dd("heelo");
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tag_id' => 'required'
        ]);

        Note::create($data);

        return redirect()->route('home');
    }


    public function del(Note $note){

        $note->delete();

        return redirect()->route('home');
    }

     //data updation
     public function edit(Note $note){
        $tags = Tag::all();
        return view('pages.notes.edit', ['tags'=> $tags, 'note' => $note]);
    }

    public function update(Note $note, Request $request){
        
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tag_id' => 'required'
        ]);

        
        // update model and add the data into db
        $note -> update($data);
        return redirect(route('home'));
    }

    //////
    public function search(Request $request)
    {
        $searchQuery = request('search-notes');

        $note = Note::where('title', 'like', '%' . $searchQuery . '%')
                    ->orWhere('content', 'like', '%' . $searchQuery . '%')
                    ->get();
        
        if ($note->isEmpty()) {
            return redirect()->route('home')->with('not_found', 'No matching notes found.');
        }
        
        return view('pages.main', ['notes' => $note]);
                        
    }
}
