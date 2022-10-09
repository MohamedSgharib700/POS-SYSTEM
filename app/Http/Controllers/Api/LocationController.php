<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Response;

class LocationController extends Controller
{
    public function allLocations()
    {
        $locations = Location::all();
        
        if($locations){
            
            return Response::json([
            'success' => true,
            'message' => 'this is all locations',
            'data' => $locations
              
             ],200);
         
        }else{
              
             return Response::json([
            'success' => false,
            'message' => 'There are no locations',
         ], 404);
            
        }
         
    }
}
