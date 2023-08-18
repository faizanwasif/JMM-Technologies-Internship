<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Tag;
use App\Models\History;

use App\Models\Activity;

class ContactController extends Controller
{
    public function index()
    {
        $contact_id = request('contact');

        $contact = auth()->user()->contacts()->findOrFail($contact_id);

        $activities = $contact->activities;

        $activity_ids = $activities->pluck('id')->toArray();

        $histories = Activity::whereIn('id', $activity_ids)
        ->where('status', 1)
        ->get();

        
        return view('pages.contact.view', compact('contact', 'histories'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('pages.contact.create', compact('tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',

        ]);

        auth()->user()->contacts()->create($data);

        return redirect()->route('contact-list');
    }

    // data deletion
    public function del(Contact $contact){

        $contact->delete();

        return redirect()->route('contact-list');
    }

     //data updation
     public function edit(Contact $contact){
        $tags = Tag::all();
        
        return view('pages.contact.edit', compact('contact', 'tags'));
    }

    public function update(Contact $contact, Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'tag_id' => 'nullable',
        ]);

        // update model and add the data into db
        $contact -> update($data);
        return redirect(route('contact-list'));
    }

    
}
