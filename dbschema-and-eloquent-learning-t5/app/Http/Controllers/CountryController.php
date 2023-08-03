<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{

    // main page
    public function index(){
        
        $countryInfo = Country::all();
        return view('country.show', 
        [
            'countryInfo' => $countryInfo
        ]);
    }

    // data insertion
    public function create(){
        return view('country.create');
    }

    public function add(Request $request){
        $data = $request->validate([
            'name' => 'required'
        ]);

        $addData = Country::create($data);

        return redirect(route('country.show'));
    }

    //data updation
    public function edit(Country $country){
        
        return view('country.edit', ['country'=> $country]);
    }

    public function update(Country $country, Request $request){
        
        $data = $request->validate([
            'name' => 'required'
        ]);

        
        // update model and add the data into db
        $country -> update($data);
        return redirect(route('country.show'));
    }

    // data deletion
    public function del(Country $country){
        // we have to get states and delete them too, 
        //and in the states controller we would delete cities as well

        $country->delete();

        return redirect()->route('country.show');
    }

}
