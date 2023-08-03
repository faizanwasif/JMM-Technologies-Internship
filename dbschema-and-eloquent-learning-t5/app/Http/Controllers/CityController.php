<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;



class CityController extends Controller
{
     // main page
     public function index(){

        $cityInfo = City::all();
        return view('city.show', 
        [
            'cityInfo' => $cityInfo
        ]);
    }

    // data insertion
    public function create(){
        $stateInfo = State::all();
        return view('city.create', ['stateInfo'=> $stateInfo]);
    }

    public function add(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'state_id' => 'required'
        ]);

        //dd($data);

        $addData = City::create($data);

        return redirect(route('city.show'));
    }

    //data updation
    public function edit(City $city){
        
        return view('city.edit', ['city'=> $city]);
    }

    public function update(City $city, Request $request){
        
        $data = $request->validate([
            'name' => 'required'
        ]);

        
        // update model and add the data into db
        $city -> update($data);
        return redirect(route('city.show'));
    }

    // data deletion
    public function del(City $city){
        // we have to get citys and delete them too, 
        //and in the citys controller we would delete cities as well

        $city->delete();

        return redirect()->route('city.show');
    }
}
