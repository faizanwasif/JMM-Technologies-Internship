<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CountryController extends Controller
{

    // main page
    public function index(){

        $countryInfo =  Country::all();

        $mappedCollection = $countryInfo->map(function ($country) {
            $stateInfo = State::where('country_id', '=', $country->id)->get();

            $stateIds = $stateInfo->pluck('id')->toArray();

            $cityInfo = City::whereIn('state_id',  $stateIds)->get();
          

            return [
                'id' => $country->id,
                'country_name' => $country->name,
                'states_count' => count($stateInfo),
                'cities_count' => count($cityInfo),
            ];
        });

        $mappedCollection = $mappedCollection->sortByDesc('states_count');

        return view('country.show', 
        [
            'countryInfo' => $mappedCollection
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
    public function del(Country $country, State $state, City $city){
        // we have to get states and delete them too, 
        // and in the states controller we would delete cities as well

        // Get states of the country
        
        $stateInfo = State::where('country_id','=',$country->id)->get();
        
        // Extract state IDs into an array
        $stateIds = $stateInfo->pluck('id')->toArray();

        // get Cities of the states and delete
        City::whereIn('state_id', $stateIds)->delete();

        $stateInfo->each->delete();

        $country->delete();

        return redirect()->route('country.show');
    }

}
