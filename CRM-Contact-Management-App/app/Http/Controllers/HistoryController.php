<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Contact;
use App\Models\Activity;

class HistoryController extends Controller
{
    public function index()
    {
        $history_ids = History::pluck('id')->toArray();
        $activities = Activity::whereIn('id', $history_ids)->get();

        

        return $activities;
    }
}
