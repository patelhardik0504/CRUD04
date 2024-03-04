<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    //
    public function fetchState(Request $request)
    {
         
        $data['states'] = DB::table('states')->where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
       
        $data['districts'] = DB::table('districts')->where("state_id", $request->state_id)->get(["id", "name"]);
        return response()->json($data);
    }
}
