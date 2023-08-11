<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Note;

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
        Note::where('tag_id','=', $tag->id)->delete();

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

    public function search(Request $request)
    {
        $searchQuery = request('search-notes');

        $tag = Tag::where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('description', 'like', '%' . $searchQuery . '%')
                    ->get();
        
        if ($tag->isEmpty()) {
            return redirect()->route('view-tags')->with('not_found', 'No matching notes found.');
        }
        
        return view('pages.tags.view-tags', ['tags' => $tag]);
                        
    }
    
}
