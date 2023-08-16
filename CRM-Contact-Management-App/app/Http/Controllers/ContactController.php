<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

class ContactController extends Controller
{
    public function index()
    {
        $contact_id = request('contact');

        // this will return the contact that belongs to the user based on the contact_id
        
        $contact = auth()->user()->contacts()->where('id', $contact_id)->first();
        return view('pages.contact.view', compact('contact'));
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
}
