<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class DropdownController extends Controller
{

    function index(){
        $countries = Country::latest()->get();
        return view('index', ['countries'=>$countries]);
    }

    function fetchstate(Request $request){
        $state = State::where('country_id', $request->country_id)->get();
        return response()->json($state);
    }

    function fetchcity(Request $request){
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }

}
