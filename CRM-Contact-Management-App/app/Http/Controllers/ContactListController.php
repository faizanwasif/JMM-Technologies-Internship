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
}
