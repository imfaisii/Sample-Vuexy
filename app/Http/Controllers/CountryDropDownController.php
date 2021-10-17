<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryDropDownController extends Controller
{
    public function getStates(Request $request)
    {
        $data['states'] = DB::table('states')->where("country_id", $request->country_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }

    public function getCities(Request $request)
    {
        $data['cities'] = DB::table('cities')->where("state_id", $request->state_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
}
