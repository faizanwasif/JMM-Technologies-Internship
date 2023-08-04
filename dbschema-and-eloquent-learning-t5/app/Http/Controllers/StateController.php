<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use App\Models\City;

class StateController extends Controller
{
     // main page
     public function index(){

        $stateInfo = State::all();
        return view('state.show', 
        [
            'stateInfo' => $stateInfo
        ]);
    }

    // data insertion
    public function create(){
        $countryInfo = Country::all();
        return view('state.create', ['countryInfo'=> $countryInfo]);
    }

    public function add(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'country_id' => 'required'
        ]);

        //dd($data);

        $addData = State::create($data);

        return redirect(route('state.show'));
    }

    //data updation
    public function edit(State $state){
        
        return view('state.edit', ['state'=> $state]);
    }

    public function update(State $state, Request $request){
        
        $data = $request->validate([
            'name' => 'required'
        ]);

        
        // update model and add the data into db
        $state -> update($data);
        return redirect(route('state.show'));
    }

    // data deletion
    public function del(State $state){

        // get Cities of the states and delete
        City::where('state_id','=', $state->id)->delete();

        $state->delete();

        return redirect()->route('state.show');
    }
}
