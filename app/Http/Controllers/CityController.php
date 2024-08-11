<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
class CityController extends Controller
{
     public function getCities(Request $request)
        {

            $stateId = $request->state_id;
            $cities = City::where('state_id', $stateId)->get();
            $response = [];
            if(!empty($cities)){
            $response['status'] = true;
            $response['city'] = $cities;
            }
            else
            {
               $response['status'] = false;
               $response['message'] = "No City Found Based Of State";
            }
            return response()->json($response);
        }
}
