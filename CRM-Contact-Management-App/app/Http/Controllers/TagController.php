<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{

    public function create(){
        return view('pages.tag.add');
    }

    public function add(Request $request){

        $user_id = Auth::id();

    
        $data = $request->validate([
            'name' => 'required'
        ]);
    
        $tag = Tag::create([
            'name' => $data['name'], // Access the 'name' value from the $data array
            'user_id' => $user_id
        ]);
    
        return redirect()->route('view-tags');
    }


    // data deletion
    public function del(Tag $tag){

        // get Cities of the states and delete
        Contact::where('tag_id','=', $tag->id)->delete();

        $tag->delete();

        return redirect()->route('view-tags');
    }

     //data updation
     public function edit(Tag $tag){
        
        return view('pages.tags.edit', ['tag'=> $tag]);
    }

    public function update(Tag $tag, Request $request){
        
        $data = $request->validate([
            'name' => 'required',
        ]);

        // update model and add the data into db
        $tag -> update($data);
        return redirect(route('view-tags'));
    }

    public function search()
    {
        $searchQuery = request('search-tag');

        $tag = Tag::where('name', 'like', '%' . $searchQuery . '%')
                    ->get();
        
        if ($tag->isEmpty()) {
            return redirect()->route('view-tags')->with('not_found', 'No matching notes found.');
        }
        
        return view('pages.tag.view', ['tags' => $tag]);
                        
    }


    public function showNote(){
        $tag_id = request('tag');
    
        $note = Note::where('id', $tag_id)->get();
    
        if ($note->isEmpty()) {
            return redirect()->route('home', ['notes' => $note]);
        }
        
        return redirect()->route('home', ['notes' => $note])->with('found', 'Match found.');
        
    }
}
