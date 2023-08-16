<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactListController extends Controller
{
    public function index(){
        $contacts = Contact::orderBy('name', 'asc')->get();
        return view('home', compact('contacts'));
    }
}
