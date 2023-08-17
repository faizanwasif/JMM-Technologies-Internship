<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactListController extends Controller
{
    public function index(){

        // this will return all the contacts of the authenticated user
        // paginate command will paginate the data by 10 per page
        
        $contacts = auth()->user()->contacts()->orderBy('name', 'asc')->paginate(10);

        return view('home', compact('contacts'));
    }

    public function search(Request $request)
    {
        $searchQuery = request('search-contact');

        $contacts = Contact::where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('email', 'like', '%' . $searchQuery . '%')
                    ->orWhere('phone', 'like', '%' . $searchQuery . '%')
                    ->orWhere('company', 'like', '%' . $searchQuery . '%')
                    ->orderBy('name', 'asc')
                    ->get();
        
        if ($contacts->isEmpty()) {
            return redirect()->route('contact-list')->with('not_found', 'No matching notes found.');
        }
        
        return view('home', ['contacts' => $contacts]);
                        
    }
}
