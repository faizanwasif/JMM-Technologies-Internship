<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Contact;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = Contact::with('histories')->get();
        return view('pages.contact.view', compact('histories'));
    }
}
